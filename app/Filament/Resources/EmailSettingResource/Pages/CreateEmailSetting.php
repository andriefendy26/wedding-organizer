<?php

namespace App\Filament\Resources\EmailSettingResource\Pages;

use App\Filament\Resources\EmailSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmailSetting extends CreateRecord
{
    protected static string $resource = EmailSettingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Refresh mail configuration after creating a setting
        $this->record->refreshMailConfig();
    }
}