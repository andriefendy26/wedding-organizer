<?php

namespace App\Filament\Resources\SuratTemplateResource\Pages;

use App\Filament\Resources\SuratTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuratTemplate extends ViewRecord
{
    protected static string $resource = SuratTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
