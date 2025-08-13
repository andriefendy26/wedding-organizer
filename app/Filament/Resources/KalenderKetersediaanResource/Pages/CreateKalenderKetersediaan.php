<?php

namespace App\Filament\Resources\KalenderKetersediaanResource\Pages;

use App\Filament\Resources\KalenderKetersediaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKalenderKetersediaan extends CreateRecord
{
    protected static string $resource = KalenderKetersediaanResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
