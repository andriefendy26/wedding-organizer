<?php

namespace App\Filament\Resources\InvoiceSettingResource\Pages;

use App\Filament\Resources\InvoiceSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewInvoiceSettings extends ViewRecord
{
    protected static string $resource = InvoiceSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make()
                ->requiresConfirmation(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Setting Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('key')
                            ->label('Setting Key')
                            ->copyable()
                            ->weight('bold'),

                        Infolists\Components\TextEntry::make('type')
                            ->label('Type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'text' => 'gray',
                                'textarea' => 'blue',
                                'number' => 'green',
                                'email' => 'orange',
                                'url' => 'purple',
                                'image' => 'pink',
                                'boolean' => 'indigo',
                                'json' => 'yellow',
                                default => 'gray',
                            }),

                        Infolists\Components\TextEntry::make('value')
                            ->label('Value')
                            ->formatStateUsing(function ($state, $record) {
                                return match ($record->type) {
                                    'boolean' => $state ? '✅ Yes' : '❌ No',
                                    'json' => $state ? json_encode(json_decode($state), JSON_PRETTY_PRINT) : 'No data',
                                    default => $state ?: 'Not set'
                                };
                            })
                            ->copyable(fn ($record) => $record->type !== 'image')
                            ->markdown(fn ($record) => $record->type === 'json'),

                        Infolists\Components\ImageEntry::make('value')
                            ->label('Image Preview')
                            ->visible(fn ($record) => $record->type === 'image')
                            ->height(200)
                            ->width(200),

                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime(),

                        Infolists\Components\TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime()
                            ->since(),
                    ])
                    ->columns(2),
            ]);
    }
}