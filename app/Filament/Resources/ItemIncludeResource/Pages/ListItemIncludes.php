<?php

namespace App\Filament\Resources\ItemIncludeResource\Pages;

use App\Filament\Resources\ItemIncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemIncludes extends ListRecords
{
    protected static string $resource = ItemIncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
