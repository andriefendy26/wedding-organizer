<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangTransaksi extends Model
{
    use HasFactory;

    protected $table = "tb_barang_transaksi";

    protected $fillable = [
        'barang_id',
        'transaksi_id',
        'jumlah',
        'total'
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }
}
