<?php

namespace App\Filament\Resources\SuratHeaderResource\Pages;

use App\Filament\Resources\SuratHeaderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSuratHeader extends CreateRecord
{
    protected static string $resource = SuratHeaderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

