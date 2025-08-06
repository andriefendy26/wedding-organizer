<?php

// app/Filament/Resources/TestimoniResource/Pages/ListTestimonis.php
namespace App\Filament\Resources\TestimoniResource\Pages;

use App\Filament\Resources\TestimoniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTestimoni extends ListRecords
{
    protected static string $resource = TestimoniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Testimoni')
                ->icon('heroicon-o-plus'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua')
                ->badge(fn () => $this->getModel()::count()),
            
            'excellent' => Tab::make('Rating 5')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('rating', 5))
                ->badge(fn () => $this->getModel()::where('rating', 5)->count()),
            
            'good' => Tab::make('Rating 4')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('rating', 4))
                ->badge(fn () => $this->getModel()::where('rating', 4)->count()),
            
            'average' => Tab::make('Rating ≤3')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('rating', '<=', 3))
                ->badge(fn () => $this->getModel()::where('rating', '<=', 3)->count()),
        ];
    }
}