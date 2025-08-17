<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuratVerificationController extends Controller
{
    public function verify(string $publicLink): View
    {
        $surat = Surat::where('public_link', $publicLink)
            ->orWhere('public_link', 'surat/verifikasi/' . $publicLink) // fallback data lama
            ->with(['template', 'approvedBy', 'rejectedBy'])
            ->first();

        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        return view('surat.verification', compact('surat'));
    }

    public function downloadPdf(string $publicLink)
    {
        $surat = Surat::where('public_link', $publicLink)
            ->orWhere('public_link', 'surat/verifikasi/' . $publicLink)
            ->first();

        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        if (!$surat->isApproved()) {
            abort(403, 'Surat belum disetujui');
        }

        $suratService = app(\App\Services\SuratService::class);
        $pdfPath = $suratService->downloadPdf($surat);

        // Bersihkan filename dari karakter ilegal
        $safeFilename = preg_replace('/[^a-zA-Z0-9\-_\.]/', '_', $surat->nomor_surat);
        
        // Jika ada parameter inline, tampilkan di browser
        if (request()->has('inline')) {
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $safeFilename . '.pdf"'
            ]);
        }
        
        return response()->download($pdfPath, $safeFilename . '.pdf');
    }

    public function previewPdf(string $publicLink)
    {
        $surat = Surat::where('public_link', $publicLink)
            ->orWhere('public_link', 'surat/verifikasi/' . $publicLink)
            ->first();

        if (!$surat) {
            abort(404, 'Surat tidak ditemukan');
        }

        if (!$surat->isApproved()) {
            abort(403, 'Surat belum disetujui');
        }

        $suratService = app(\App\Services\SuratService::class);
        $pdfPath = $suratService->downloadPdf($surat);

        // Tampilkan halaman preview dengan iframe PDF
        return view('surat.preview', [
            'surat' => $surat,
            'pdfUrl' => route('surat.download', ['publicLink' => $surat->public_token]) . '?inline=1'
        ]);
    }
}
