<?php

namespace App\Filament\Resources\PaketIncludeResource\Pages;

use App\Filament\Resources\PaketIncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaketIncludes extends ListRecords
{
    protected static string $resource = PaketIncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
