<?php

namespace App\Filament\Resources\SewaLayananResource\Pages;

use App\Filament\Resources\SewaLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSewaLayanan extends EditRecord
{
    protected static string $resource = SewaLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
