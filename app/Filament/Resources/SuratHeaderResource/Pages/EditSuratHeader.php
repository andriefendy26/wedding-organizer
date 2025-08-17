<?php

namespace App\Filament\Resources\SuratHeaderResource\Pages;

use App\Filament\Resources\SuratHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratHeader extends EditRecord
{
    protected static string $resource = SuratHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
