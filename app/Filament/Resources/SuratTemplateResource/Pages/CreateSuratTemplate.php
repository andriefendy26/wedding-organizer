<?php

namespace App\Filament\Resources\SuratTemplateResource\Pages;

use App\Filament\Resources\SuratTemplateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSuratTemplate extends CreateRecord
{
    protected static string $resource = SuratTemplateResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
