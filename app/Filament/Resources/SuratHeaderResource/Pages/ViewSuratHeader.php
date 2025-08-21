<?php

namespace App\Filament\Resources\SuratHeaderResource\Pages;

use App\Filament\Resources\SuratHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuratHeader extends ViewRecord
{
    protected static string $resource = SuratHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

