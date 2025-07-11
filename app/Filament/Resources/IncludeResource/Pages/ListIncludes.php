<?php

namespace App\Filament\Resources\IncludeResource\Pages;

use App\Filament\Resources\IncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncludes extends ListRecords
{
    protected static string $resource = IncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
