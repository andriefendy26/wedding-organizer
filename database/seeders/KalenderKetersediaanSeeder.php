<?php

namespace Database\Seeders;

use App\Models\KalenderKetersediaan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KalenderKetersediaanSeeder extends Seeder
{
    public function run()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->addMonths(3)->endOfMonth();

        $current = $startDate->copy();
        
        while ($current <= $endDate) {
            // Skip weekend sebagai contoh
            if ($current->isWeekend()) {
                KalenderKetersediaan::create([
                    'tanggal' => $current->toDateString(),
                    'status' => 'unavailable',
                    'catatan' => 'Weekend - Tidak ada layanan'
                ]);
            } else {
                KalenderKetersediaan::create([
                    'tanggal' => $current->toDateString(),
                    'status' => 'available',
                    'catatan' => null
                ]);
            }
            
            $current->addDay();
        }
    }
}