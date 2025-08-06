<?php

namespace App\Filament\Resources\TestimoniResource\Pages;

use App\Filament\Resources\TestimoniResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTestimoni extends CreateRecord
{
    protected static string $resource = TestimoniResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Testimoni berhasil ditambahkan!')
            ->body('Testimoni baru telah berhasil disimpan ke database.');
    }
}
