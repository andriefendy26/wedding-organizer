<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Transaksi::query();

        // Apply filters if provided
        if (!empty($this->filters['created_from'])) {
            $query->where('created_at', '>=', $this->filters['created_from']);
        }

        if (!empty($this->filters['created_until'])) {
            $query->where('created_at', '<=', $this->filters['created_until']);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Customer',
            'NIK Customer',
            'Email Customer',
            'Tanggal Sewa',
            'Tanggal Kembali',
            'Bukti Bayar',
            'Total Biaya',
            'Status',
            'Created At',
            'Updated At',
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->id,
            $transaksi->customer->nama ?? '-',
            "'" . ($transaksi->customer->NIK ?? '-'),
            // $transaksi->customer->email ?? '-',
            $transaksi->tanggal_sewa,
            $transaksi->tanggal_kembali,
            asset('storage/' . $transaksi->bukti_bayar),
            $transaksi->total_biaya,
            $this->statusLabel($transaksi->status),
            // $transaksi->email_verified_at ? $transaksi->email_verified_at->format('Y-m-d H:i:s') : null,
            $transaksi->created_at->format('Y-m-d H:i:s'),
            $transaksi->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    private function statusLabel($status)
    {
        return $status == 1 ? 'Selesai' : 'Belum Selesai';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text
            1 => ['font' => ['bold' => true]],
        ];
    }
}
