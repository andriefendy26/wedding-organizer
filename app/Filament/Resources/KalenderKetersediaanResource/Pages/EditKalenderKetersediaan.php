<?php

namespace App\Filament\Resources\KalenderKetersediaanResource\Pages;

use App\Filament\Resources\KalenderKetersediaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKalenderKetersediaan extends EditRecord
{
    protected static string $resource = KalenderKetersediaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
