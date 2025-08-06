<?php

namespace App\Filament\Widgets;

use App\Models\Artikel;
use App\Models\Customers;
use App\Models\Team;
use App\Models\Transaksi;
use App\Models\Konsultasi;
use App\Models\Subscribers;
use App\Models\Testimoni;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    
    protected function getStats(): array
    {
        // Hitung total data
        $artikel = Artikel::count();
        $team = Team::count();
        $customer = Customers::count();
        $transaksi = Transaksi::count();
        $konsultasi = Konsultasi::count();
        $subscribers = Subscribers::count();
        $testimoni = Testimoni::count();

        // Hitung perubahan bulan ini vs bulan lalu
        $artikelThisMonth = Artikel::whereMonth('created_at', now()->month)->count();
        $artikelLastMonth = Artikel::whereMonth('created_at', now()->subMonth()->month)->count();
        $artikelChange = $artikelLastMonth > 0 ? (($artikelThisMonth - $artikelLastMonth) / $artikelLastMonth) * 100 : 0;

        $transaksiThisMonth = Transaksi::whereMonth('created_at', now()->month)->count();
        $transaksiLastMonth = Transaksi::whereMonth('created_at', now()->subMonth()->month)->count();
        $transaksiChange = $transaksiLastMonth > 0 ? (($transaksiThisMonth - $transaksiLastMonth) / $transaksiLastMonth) * 100 : 0;

        $customerThisMonth = Customers::whereMonth('created_at', now()->month)->count();
        $customerLastMonth = Customers::whereMonth('created_at', now()->subMonth()->month)->count();
        $customerChange = $customerLastMonth > 0 ? (($customerThisMonth - $customerLastMonth) / $customerLastMonth) * 100 : 0;

        // Total pendapatan
        $totalRevenue = Transaksi::where('status', 'completed')->sum('total_biaya');
        $revenueThisMonth = Transaksi::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->sum('total_biaya');

        return [
            Stat::make('Total Artikel', $artikel)
                ->description($artikelChange >= 0 ? 'Naik ' . number_format($artikelChange, 1) . '%' : 'Turun ' . number_format(abs($artikelChange), 1) . '%')
                ->descriptionIcon($artikelChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($artikelChange >= 0 ? 'success' : 'danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Transaksi', $transaksi)
                ->description($transaksiChange >= 0 ? 'Naik ' . number_format($transaksiChange, 1) . '%' : 'Turun ' . number_format(abs($transaksiChange), 1) . '%')
                ->descriptionIcon($transaksiChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($transaksiChange >= 0 ? 'success' : 'danger')
                ->chart([17, 16, 14, 15, 14, 13, 12]),

            Stat::make('Total Customer', $customer)
                ->description($customerChange >= 0 ? 'Naik ' . number_format($customerChange, 1) . '%' : 'Turun ' . number_format(abs($customerChange), 1) . '%')
                ->descriptionIcon($customerChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($customerChange >= 0 ? 'success' : 'danger')
                ->chart([15, 4, 10, 22, 15, 16, 14]),

            Stat::make('Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Bulan ini: Rp ' . number_format($revenueThisMonth, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

            Stat::make('Tim', $team)
                ->description('Total anggota tim')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Konsultasi', $konsultasi)
                ->description('Permintaan konsultasi')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
            Stat::make('Testimoni', $testimoni)
                ->description('Permintaan konsultasi')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
            Stat::make('Subscriber', $subscribers)
                ->description('Permintaan konsultasi')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}