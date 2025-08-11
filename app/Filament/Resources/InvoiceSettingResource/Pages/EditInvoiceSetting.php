<?php


namespace App\Filament\Resources\InvoiceSettingResource\Pages;

use App\Filament\Resources\InvoiceSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvoiceSetting extends EditRecord
{
    protected static string $resource = InvoiceSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->requiresConfirmation(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Convert string boolean to actual boolean for form
        if ($data['type'] === 'boolean') {
            $data['value'] = $data['value'] === '1' || $data['value'] === 'true';
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Convert boolean to string for storage
        if ($data['type'] === 'boolean') {
            $data['value'] = $data['value'] ? '1' : '0';
        }

        // Validate and format JSON
        if ($data['type'] === 'json' && !empty($data['value'])) {
            $decoded = json_decode($data['value'], true);
            if ($decoded !== null) {
                $data['value'] = json_encode($decoded, JSON_PRETTY_PRINT);
            }
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

