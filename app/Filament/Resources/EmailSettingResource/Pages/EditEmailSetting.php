<?php

namespace App\Filament\Resources\EmailSettingResource\Pages;

use App\Filament\Resources\EmailSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmailSetting extends EditRecord
{
    protected static string $resource = EmailSettingResource::class;

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

    protected function afterSave(): void
    {
        // Refresh mail configuration after saving
        $this->record->refreshMailConfig();
    }
}
