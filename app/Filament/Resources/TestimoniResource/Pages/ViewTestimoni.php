<?php

namespace App\Filament\Resources\TestimoniResource\Pages;

use App\Filament\Resources\TestimoniResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class ViewTestimoni extends ViewRecord
{
    protected static string $resource = TestimoniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Testimoni')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                ImageEntry::make('foto')
                                    ->label('Foto Profil')
                                    ->circular()
                                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama) . '&color=7F9CF5&background=EBF4FF')
                                    ->size(120),
                                
                                TextEntry::make('nama')
                                    ->label('Nama')
                                    ->size('lg')
                                    ->weight('bold'),
                                
                                TextEntry::make('rating')
                                    ->label('Rating')
                                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state) . " ({$state}/5)")
                                    ->size('lg'),
                            ]),
                        
                        TextEntry::make('user.name')
                            ->label('User Account')
                            ->placeholder('Guest User')
                            ->badge()
                            ->color('success'),
                        
                        TextEntry::make('deskripsi')
                            ->label('Testimoni')
                            ->columnSpanFull()
                            ->prose(),
                    ]),
                
                Section::make('Metadata')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Dibuat pada')
                                    ->dateTime('d F Y, H:i:s'),
                                
                                TextEntry::make('updated_at')
                                    ->label('Terakhir diupdate')
                                    ->dateTime('d F Y, H:i:s'),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }
}