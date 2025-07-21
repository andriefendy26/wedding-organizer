<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class KalenderKetersediaan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Kalender Ketersediaan';
    protected static ?string $slug = 'kalender-ketersediaan';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static string $view = 'filament.pages.kalender-ketersediaan';
    protected static ?int $navigationSort = 3;
}
