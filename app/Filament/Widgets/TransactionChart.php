<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use App\Models\Customers;
use App\Models\Artikel;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Transaksi & Customer';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '15s';

    protected function getData(): array
    {
        // Data transaksi per bulan (6 bulan terakhir)
        $transactionData = [];
        $customerData = [];
        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M Y');
            $months[] = $monthName;

            $transactionCount = Transaksi::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $customerCount = Customers::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $transactionData[] = $transactionCount;
            $customerData[] = $customerCount;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Transaksi',
                    'data' => $transactionData,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Customer Baru',
                    'data' => $customerData,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'borderColor' => 'rgb(16, 185, 129)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
        ];
    }
}

// Widget Chart untuk Revenue
class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Pendapatan Bulanan';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '15s';

    protected function getData(): array
    {
        $revenueData = [];
        $months = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M Y');
            $months[] = $monthName;

            $revenue = Transaksi::where('status', 'completed')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total_biaya');

            $revenueData[] = $revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $revenueData,
                    'backgroundColor' => [
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(245, 101, 101, 0.8)',
                        'rgba(251, 146, 60, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(163, 230, 53, 0.8)',
                        'rgba(74, 222, 128, 0.8)',
                        'rgba(34, 211, 238, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(168, 85, 247, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                        'rgba(244, 63, 94, 0.8)',
                    ],
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => 'function(value) { return "Rp " + new Intl.NumberFormat("id-ID").format(value); }',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) { return "Pendapatan: Rp " + new Intl.NumberFormat("id-ID").format(context.parsed.y); }',
                    ],
                ],
            ],
        ];
    }
}

// Widget Chart untuk Status Transaksi
class TransactionStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Transaksi';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $statusCounts = Transaksi::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $labels = array_keys($statusCounts);
        $data = array_values($statusCounts);

        // Mapping status ke bahasa Indonesia
        $statusMapping = [
            'pending' => 'Menunggu',
            'confirmed' => 'Dikonfirmasi',
            'in_progress' => 'Dalam Proses',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
        ];

        $translatedLabels = array_map(function($status) use ($statusMapping) {
            return $statusMapping[$status] ?? ucfirst($status);
        }, $labels);

        return [
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(59, 130, 246, 0.8)',   // pending - blue
                        'rgba(251, 191, 36, 0.8)',   // confirmed - yellow
                        'rgba(245, 101, 101, 0.8)',  // in_progress - orange
                        'rgba(16, 185, 129, 0.8)',   // completed - green
                        'rgba(239, 68, 68, 0.8)',    // cancelled - red
                    ],
                    'borderColor' => [
                        'rgba(59, 130, 246, 1)',
                        'rgba(251, 191, 36, 1)',
                        'rgba(245, 101, 101, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(239, 68, 68, 1)',
                    ],
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $translatedLabels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}