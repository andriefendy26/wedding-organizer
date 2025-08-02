<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Services\QrCodeService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateLetter extends CreateRecord
{
    protected static string $resource = LetterResource::class;
    protected function afterCreate(): void
    {
        $this->processLetterWithQrCode();
    }

    protected function processLetterWithQrCode(): void
    {
        $record = $this->record;
        $qrService = app(QrCodeService::class);

        try {
            // Generate public link
            $publicSlug = Str::random(32);
            $publicLink = "/letters/public/{$publicSlug}";
            
            // Generate QR Code
            $qrCodePath = $qrService->generateQrCode(
                url($publicLink),
                'qr_' . $record->id . '_' . time()
            );
            
            // Add QR Code to PDF
            $signedFileName = 'signed_' . $record->id . '_' . time() . '.pdf';
            $signedFilePath = 'letters/signed/' . $signedFileName;
            
            $finalPath = $qrService->addQrCodeToPdf(
                $record->original_file_path,
                $qrCodePath,
                $signedFilePath
            );
            
            // Update record
            $record->update([
                'signed_file_path' => $finalPath,
                'qr_code_path' => $qrCodePath,
                'public_link' => $publicLink,
                'status' => 'completed'
            ]);
            
            Notification::make()
                ->success()
                ->title('Surat berhasil diproses!')
                ->body('QR Code telah ditambahkan ke surat.')
                ->send();
                
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Gagal memproses surat: ' . $e->getMessage())
                ->send();
        }
    }
}
