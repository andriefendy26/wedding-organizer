<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeams extends ListRecords
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Tim')
                ->icon('heroicon-o-plus'),
        ];
    }
    
    public function getTitle(): string
    {
        return 'Daftar Tim';
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            // TeamResource\Widgets\TeamStatsOverview::class,
        ];
    }
}