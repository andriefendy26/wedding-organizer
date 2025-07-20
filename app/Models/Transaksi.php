<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "tb_transaksi";

    protected $fillable  = [
        'user_id',
        'layanan_id',
        'customer_id',
        'paket_layanan_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'total_biaya',
        'bukti_bayar',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function barangTransaksi(): HasMany
    {
        return $this->hasMany(BarangTransaksi::class);
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function paketLayanan()
    {
        return $this->belongsTo(\App\Models\PaketLayanan::class, 'paket_layanan_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    protected static function booted()
    {
        static::creating(function ($transaksi) {
            $transaksi->public_id = \Illuminate\Support\Str::uuid();
        });
    }
}
