<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of articles
     */
     /**
     * Display a listing of articles
     */
    public function index(Request $request)
    {
        $query = Artikel::query();
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                  ->orWhere('sub_judul', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->filled('category') && $request->get('category') !== 'all') {
            $category = $request->get('category');
            $query->where('tags', 'LIKE', "%{$category}%");
        }
        
        $artikels = $query->latest()->paginate(12);
        
        return view('artikel', compact('artikels'));
    }
    /**
     * Display the specified article by slug
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        
        // Get related articles (same tags or recent articles)
        $relatedArtikels = Artikel::where('id', '!=', $artikel->id)
            ->where(function($query) use ($artikel) {
                if ($artikel->tags) {
                    $tags = is_array($artikel->tags) ? $artikel->tags : json_decode($artikel->tags, true);
                    if ($tags) {
                        foreach ($tags as $tag) {
                            $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
                        }
                    }
                }
            })
            ->orWhere('id', '!=', $artikel->id) // Fallback to recent articles
            ->latest()
            ->limit(3)
            ->get();

        // If no related articles found, get latest articles
        if ($relatedArtikels->count() < 3) {
            $relatedArtikels = Artikel::where('id', '!=', $artikel->id)
                ->latest()
                ->limit(3)
                ->get();
        }

        // Calculate reading time (assuming 200 words per minute)
        $wordCount = str_word_count(strip_tags($artikel->content));
        $readingTime = ceil($wordCount / 200);

        return view('detailartikel', compact('artikel', 'relatedArtikels', 'readingTime'));
    }

    /**
     * Get article excerpt
     */
    public function getExcerpt($content, $length = 150)
    {
        $cleanContent = strip_tags($content);
        return Str::limit($cleanContent, $length);
    }
}