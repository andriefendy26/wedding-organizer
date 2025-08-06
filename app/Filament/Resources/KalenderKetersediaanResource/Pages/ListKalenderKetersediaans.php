<?php

namespace App\Filament\Resources\KalenderKetersediaanResource\Pages;

use App\Filament\Resources\KalenderKetersediaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKalenderKetersediaans extends ListRecords
{
    protected static string $resource = KalenderKetersediaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
