<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit')
                ->color('warning'),
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->requiresConfirmation()
                ->modalHeading('Hapus Anggota Tim')
                ->modalDescription('Apakah Anda yakin ingin menghapus anggota tim ini?'),
        ];
    }
    
    public function getTitle(): string
    {
        return 'Detail Anggota Tim';
    }
    
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Personal')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                ImageEntry::make('foto')
                                    ->label('Foto Profil')
                                    ->size(150)
                                    ->circular()
                                    ->defaultImageUrl(url('/images/default-avatar.png'))
                                    ->columnSpan(1),
                                    
                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('nama')
                                            ->label('Nama Lengkap')
                                            ->size(TextEntry\TextEntrySize::Large)
                                            ->weight('bold'),
                                            
                                        TextEntry::make('jabatan')
                                            ->label('Jabatan')
                                            ->badge()
                                            ->color('info'),
                                    ])
                                    ->columnSpan(2),
                            ]),
                    ]),
                    
                Section::make('Informasi Kontak')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('telepon')
                                    ->label('Nomor Telepon')
                                    ->icon('heroicon-m-phone')
                                    ->copyable()
                                    ->placeholder('Tidak ada data')
                                    ->columnSpan(1),
                                    
                                TextEntry::make('email')
                                    ->label('Email')
                                    ->icon('heroicon-m-envelope')
                                    ->copyable()
                                    ->placeholder('Tidak ada data')
                                    ->columnSpan(1),
                            ]),
                    ]),
                    
                Section::make('Deskripsi')
                    ->schema([
                        TextEntry::make('deskripsi')
                            ->label('Bio/Deskripsi')
                            ->prose()
                            ->placeholder('Tidak ada deskripsi'),
                    ]),
                    
                Section::make('Informasi Sistem')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Dibuat pada')
                                    ->dateTime('d F Y, H:i:s'),
                                    
                                TextEntry::make('updated_at')
                                    ->label('Terakhir diperbarui')
                                    ->dateTime('d F Y, H:i:s'),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }
}