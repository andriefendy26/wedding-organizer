<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class QrCodeService
{
    public function generateQrCode(string $url, string $filename): string
    {
        $qrCodePath = 'qr-codes/' . $filename . '.svg';
        
        $qrCode = QrCode::format('svg')
            ->size(80)
            ->margin(1)
            ->errorCorrection('H')
            ->generate($url);
            
        Storage::put($qrCodePath, $qrCode);
        
        return $qrCodePath;
    }

    public function addQrCodeToPdf(string $originalPdfPath, string $qrCodePath, string $outputPath): string
    {
        try {
            // Create HTML with embedded PDF and QR code using base64
            $pdfContent = base64_encode(Storage::get($originalPdfPath));
            $qrContent = base64_encode(Storage::get($qrCodePath));
            
            // Create HTML template
            $html = view('pdf.qr-overlay', [
                'pdfData' => $pdfContent,
                'qrData' => $qrContent,
            ])->render();

            // Generate new PDF
            $pdf = Pdf::loadHTML($html)->setPaper('a4');
            
            // Save to storage
            Storage::put($outputPath, $pdf->output());
            
            return $outputPath;
            
        } catch (\Exception $e) {
            throw new \Exception('Error adding QR code to PDF: ' . $e->getMessage());
        }
    }
}