<?php

namespace App\Filament\Resources\SuratHeaderResource\Pages;

use App\Filament\Resources\SuratHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratHeaders extends ListRecords
{
    protected static string $resource = SuratHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
