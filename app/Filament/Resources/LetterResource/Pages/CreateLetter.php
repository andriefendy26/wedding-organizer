<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Services\QrCodeService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
            Log::info('Starting QR Code processing for letter ID: ' . $record->id);
            
            // Generate public link
            $publicSlug = Str::random(32);
            $publicLink = "/letters/public/{$publicSlug}";
            
            Log::info('Generated public link: ' . $publicLink);

            // Generate QR Code
            $qrCodePath = $qrService->generateQrCode(
                url($publicLink),
                'qr_' . $record->id . '_' . time()
            );
            
            Log::info('QR Code generated at: ' . $qrCodePath);

            // Pastikan original file path ada
            if (!$record->original_file_path) {
                throw new \Exception('Original file path tidak ditemukan');
            }

            // Add QR Code to PDF
            $signedFileName = 'signed_' . $record->id . '_' . time() . '.pdf';
            $signedFilePath = 'letters/signed/' . $signedFileName;

            Log::info('Processing PDF with QR Code...');
            Log::info('Original path: ' . $record->original_file_path);
            Log::info('Output path: ' . $signedFilePath);

            $finalPath = $qrService->addQrCodeToPdf(
                $record->original_file_path,
                $qrCodePath,
                $signedFilePath
            );

            Log::info('PDF processed successfully. Final path: ' . $finalPath);

            // Update record
            $record->update([
                'signed_file_path' => $finalPath,
                'qr_code_path' => $qrCodePath,
                'public_link' => $publicLink,
                'status' => 'completed'
            ]);

            Log::info('Letter record updated successfully');

            Notification::make()
                ->success()
                ->title('Surat berhasil diproses!')
                ->body('QR Code telah ditambahkan ke surat.')
                ->send();

        } catch (\Exception $e) {
            Log::error('Error processing letter with QR Code: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Update status menjadi error
            $record->update([
                'status' => 'error'
            ]);
            
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Gagal memproses surat: ' . $e->getMessage())
                ->send();
        }
    }
}