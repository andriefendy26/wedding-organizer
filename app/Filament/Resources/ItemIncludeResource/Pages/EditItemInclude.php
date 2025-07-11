<?php

namespace App\Filament\Resources\ItemIncludeResource\Pages;

use App\Filament\Resources\ItemIncludeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemInclude extends EditRecord
{
    protected static string $resource = ItemIncludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
