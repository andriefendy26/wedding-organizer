<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceSettingResource\Pages;
use App\Models\InvoiceSetting;
use Filament\Resources\Resource;

class InvoiceSettingResource extends Resource
{
    protected static ?string $model = InvoiceSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Invoice Settings';

    protected static ?string $modelLabel = 'Invoice Setting';

    protected static ?string $pluralModelLabel = 'Invoice Settings';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 99;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageInvoiceSettings::route('/'),
        ];
    }

    // Disable table view completely since we're using custom settings page
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canView($record): bool
    {
        return false;
    }
}