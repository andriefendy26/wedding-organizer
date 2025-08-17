<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TestimoniController extends Controller
{
    //
    public function index (){
        // $testimoni = Testimoni::all();
        // dd($testimoni);

        $instagram = [
            [
                'title' => "Dekorasi Premium Eksklusif",
                'href' => "https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/",
                'img' =>  asset('storage/content/wedding01.jpg'),
                'like' => 0,
                'comment' => 0
            ],
            [
                'title' => "Dekorasi Premium Eksklusif",
                'href' => "https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/",
                'img' =>  asset('storage/content/wedding01.jpg'),
                'like' => 0,
                'comment' => 0
            ],
            [
                'title' => "Dekorasi Premium Eksklusif",
                'href' => "https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/",
                'img' =>  asset('storage/content/wedding01.jpg'),
                'like' => 0,
                'comment' => 0
            ],
            [
                'title' => "Dekorasi Premium Eksklusif",
                'href' => "https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/",
                'img' =>  asset('storage/content/wedding01.jpg'),
                'like' => 0,
                'comment' => 0
            ],
        ];

        $testimoni = Testimoni::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('home', 
        compact('testimoni', 'instagram')
        );
    }
    /**
     * Display the public testimoni form
     */
    public function create()
    {
        return view('testimoni.create');
    }

    /**
     * Store a new testimoni from public form
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|string|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'rating.required' => 'Rating wajib dipilih.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal 1.',
            'rating.max' => 'Rating maksimal 5.',
            'deskripsi.required' => 'Deskripsi testimoni wajib diisi.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan: JPEG, PNG, JPG, GIF.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Prepare data for saving
            $data = [
                'user_id' => auth()->id(), // Will be null if guest
                'nama' => $request->nama,
                'rating' => $request->rating,
                'deskripsi' => $request->deskripsi,
            ];

            // Handle file upload if exists
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                
                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                
                // Store file in public/testimoni directory
                $path = $foto->storeAs('testimoni', $filename, 'public');
                
                $data['foto'] = $path;
            }

            // Create testimoni
            Testimoni::create($data);

            return redirect()->back()->with('success', 
                'Terima kasih! Testimoni Anda telah berhasil dikirim dan akan ditampilkan setelah diverifikasi.'
            );

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan testimoni. Silakan coba lagi.');
        }
    }

    /**
     * Display all approved testimonials (public view)
     */
    // public function index()
    // {
    //     $testimonis = Testimoni::orderBy('created_at', 'desc')
    //         ->paginate(12);

    //     return view('testimoni.index', compact('testimonis'));
    // }

    /**
     * Show specific testimoni (public view)
     */
    public function show(Testimoni $testimoni)
    {
        return view('testimoni.show', compact('testimoni'));
    }

}
