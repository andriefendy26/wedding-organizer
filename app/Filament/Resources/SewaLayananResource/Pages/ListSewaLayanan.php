<?php

namespace App\Filament\Resources\SewaLayananResource\Pages;

use App\Filament\Resources\SewaLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSewaLayanan extends ListRecords
{
    protected static string $resource = SewaLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
