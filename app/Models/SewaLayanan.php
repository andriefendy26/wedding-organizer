<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SewaLayanan extends Model
{
    use HasFactory;

    protected $table = "tb_sewa_layanan";

    protected $fillabel = [
        'user_id',
        'layanan_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'total_biaya',
        'status',
    ];

    public function Layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
