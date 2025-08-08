<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicLetterController extends Controller
{
    public function show(Request $request, $slug)
    {
        $letter = Letter::where('public_link', '/letters/public/' . $slug)
            ->where('status', 'completed')
            ->firstOrFail();

        return view('public.letter-view', compact('letter'));
    }

    public function download($slug)
    {
        $letter = Letter::where('public_link', '/letters/public/' . $slug)
            ->where('status', 'completed')
            ->firstOrFail();

        if (!$letter->signed_file_path || !Storage::exists($letter->signed_file_path)) {
            abort(404, 'File tidak ditemukan');
        }

        $filename = 'surat_' . $letter->nomor_surat . '.pdf';
        
        return response()->download(
            storage_path('app/' . $letter->signed_file_path),
            $filename,
            [
                'Content-Type' => 'application/pdf',
            ]
        );
    }
}
