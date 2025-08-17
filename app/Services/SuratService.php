<?php

namespace App\Services;

use App\Models\Surat;
use App\Models\SuratHeader;
use App\Models\SuratTemplate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

class SuratService
{
    protected $qrCodeService;

    public function __construct(QrCodeService $qrCodeService)
    {
        $this->qrCodeService = $qrCodeService;
    }

    public function generatePdf(Surat $surat): string
    {
        // Get header and template
        $header = SuratHeader::getActive();
        if (!$header) {
            throw new \Exception('Header surat aktif tidak ditemukan. Silakan buat header surat terlebih dahulu.');
        }

        $template = $surat->template ?? SuratTemplate::getDefaultTemplate($surat->jenis_surat);
        if (!$template) {
            throw new \Exception('Template surat tidak ditemukan untuk jenis: ' . $surat->jenis_surat);
        }

        // Prepare data for template
        $data = [
            'nama_pemohon' => $surat->nama_pemohon,
            'nik' => $surat->nik,
            'alamat' => $surat->alamat,
            'keperluan' => $surat->keperluan,
            'tanggal_surat' => $surat->tanggal_surat->format('d F Y'),
            'nomor_surat' => $surat->nomor_surat,
            'jenis_surat' => $surat->jenis_surat,
        ];

        // Replace placeholders in template
        $content = $template->replacePlaceholders($data);

        // Generate QR Code
        $qrCodePath = $this->generateQrCode($surat);

        // Create PDF
        $pdf = $this->createPdf($header, $content, $qrCodePath, $surat);

        // Save PDF dengan filename yang aman
        $safeFilename = 'surat_' . $surat->id . '_' . time();
        $pdfPath = 'surat/pdf/' . $safeFilename . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        // Update surat record
        $surat->update([
            'pdf_path' => $pdfPath,
            'qr_code_path' => $qrCodePath,
        ]);

        return $pdfPath;
    }

    protected function generateQrCode(Surat $surat): string
    {
        $verificationUrl = $surat->verification_url;
        $filename = 'surat_' . $surat->id . '_' . time();
        
        return $this->qrCodeService->generateQrCode($verificationUrl, $filename);
    }

    protected function createPdf(SuratHeader $header, string $content, string $qrCodePath, Surat $surat): \Barryvdh\DomPDF\PDF
    {
        // Embed QR sebagai data URI untuk menghindari request eksternal
        $qrBinary = Storage::disk('public')->get($qrCodePath);
        $qrMime = 'image/png';
        $qrCodeDataUri = 'data:' . $qrMime . ';base64,' . base64_encode($qrBinary);

        // Siapkan logo jika ada
        $logoDataUri = null;
        if ($header && $header->logo_path && Storage::disk('public')->exists($header->logo_path)) {
            $logoBin = Storage::disk('public')->get($header->logo_path);
            $logoExt = pathinfo($header->logo_path, PATHINFO_EXTENSION);
            $logoMime = $logoExt === 'svg' ? 'image/svg+xml' : 'image/' . strtolower($logoExt);
            $logoDataUri = 'data:' . $logoMime . ';base64,' . base64_encode($logoBin);
        }

        $html = view('surat.template', [
            'header' => $header,
            'content' => $content,
            'qrCodeUrl' => $qrCodeDataUri,
            'logoDataUri' => $logoDataUri,
            'surat' => $surat,
        ])->render();

        // Hindari timeout pembuatan PDF
        if (function_exists('set_time_limit')) {
            @set_time_limit(120);
        }

        return Pdf::loadHTML($html)
            ->setPaper('a4')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'Arial',
            ]);
    }

    public function downloadPdf(Surat $surat): string
    {
        // Pastikan PDF ada, jika tidak generate ulang
        if (!$surat->pdf_path || !Storage::disk('public')->exists($surat->pdf_path)) {
            $this->generatePdf($surat);
        }

        $fullPath = storage_path('app/public/' . $surat->pdf_path);
        
        // Pastikan file benar-benar ada
        if (!file_exists($fullPath)) {
            // Generate ulang jika file tidak ada
            $this->generatePdf($surat);
            $fullPath = storage_path('app/public/' . $surat->pdf_path);
        }

        return $fullPath;
    }

    public function previewPdf(Surat $surat): string
    {
        if (!$surat->pdf_path || !Storage::disk('public')->exists($surat->pdf_path)) {
            $this->generatePdf($surat);
        }

        return url('storage/' . $surat->pdf_path);
    }

    public function approveSurat(Surat $surat, int $userId, ?string $catatan = null): void
    {
        $surat->update([
            'status' => Surat::STATUS_DISETUJUI,
            'disetujui_oleh' => $userId,
            'tanggal_disetujui' => now(),
            'catatan_admin' => $catatan,
        ]);

        // Regenerate PDF with approval status
        $this->generatePdf($surat);
    }

    public function rejectSurat(Surat $surat, int $userId, string $alasan): void
    {
        $surat->update([
            'status' => Surat::STATUS_DITOLAK,
            'ditolak_oleh' => $userId,
            'tanggal_ditolak' => now(),
            'alasan_penolakan' => $alasan,
        ]);
    }
}
