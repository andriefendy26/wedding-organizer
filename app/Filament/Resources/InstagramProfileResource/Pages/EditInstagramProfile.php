<?php

namespace App\Filament\Resources\InstagramProfileResource\Pages;

use App\Filament\Resources\InstagramProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstagramProfile extends EditRecord
{
    protected static string $resource = InstagramProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Update Instagram URL if username changed
        if (empty($data['instagram_url']) && !empty($data['username'])) {
            $data['instagram_url'] = "https://instagram.com/{$data['username']}";
        }

        return $data;
    }
}