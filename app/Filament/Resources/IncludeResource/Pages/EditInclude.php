<?php

namespace App\Filament\Resources\IncludeResource\Pages;

use App\Filament\Resources\IncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInclude extends EditRecord
{
    protected static string $resource = IncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
