<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use App\Services\QrCodeService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditLetter extends EditRecord
{
    protected static string $resource = LetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('regenerate_qr')
                ->label('Regenerate QR Code')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->action(function () {
                    $this->processLetterWithQrCode();
                }),
        ];
    }

    protected function afterSave(): void
    {
        // Only regenerate if original file was changed
        if ($this->record->wasChanged('original_file_path')) {
            $this->processLetterWithQrCode();
        }
    }

    protected function processLetterWithQrCode(): void
    {
        $record = $this->record;
        $qrService = app(QrCodeService::class);

        try {
            // Generate public link if not exists
            if (!$record->public_link) {
                $publicSlug = Str::random(32);
                $publicLink = "/letters/public/{$publicSlug}";
            } else {
                $publicLink = $record->public_link;
            }
            
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
                ->title('QR Code berhasil diperbarui!')
                ->send();
                
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Gagal memperbarui QR Code: ' . $e->getMessage())
                ->send();
        }
    }
}
