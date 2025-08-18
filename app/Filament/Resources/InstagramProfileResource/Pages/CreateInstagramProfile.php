<?php

namespace App\Filament\Resources\InstagramProfileResource\Pages;

use App\Filament\Resources\InstagramProfileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInstagramProfile extends CreateRecord
{
    protected static string $resource = InstagramProfileResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set default Instagram URL if not provided
        if (empty($data['instagram_url']) && !empty($data['username'])) {
            $data['instagram_url'] = "https://instagram.com/{$data['username']}";
        }

        return $data;
    }
}