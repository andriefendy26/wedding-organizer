<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\KalenderKetersediaan;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function afterCreate(): void
    {
        // Ambil transaksi yang baru dibuat
        $transaksi = $this->record;

        // Ambil nama customer
        $namaCustomer = $transaksi->user->name ?? 'Customer';

        // Ambil nama layanan
        $namaLayanan = $transaksi->layanan->nama ?? 'Layanan';

        // Simpan ke tabel tb_kalender_ketersediaan
        KalenderKetersediaan::create([
            'tanggal' => Carbon::parse($transaksi->tanggal_sewa)->format('Y-m-d'),
            'status' => 'Dipesan',
            'catatan' => $namaCustomer . ' - ' . $namaLayanan,
        ]);
    }
}
