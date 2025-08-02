<?php

namespace App\Http\Controllers;

use App\Models\SignedDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentVerificationController extends Controller
{
    public function verify($code)
    {
        $document = SignedDocument::where('verification_code', $code)->firstOrFail();
        
        return view('document-verification', [
            'document' => $document,
            'downloadUrl' => Storage::url($document->file_path)
        ]);
    }
}
