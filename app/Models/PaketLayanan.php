<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaketLayanan extends Model
{
    use HasFactory;

    protected $table = 'tb_paket_layanan';

    protected $fillable = [
        'layanan_id',
        'nama_paket',
        'detail_paket',
        'deskripsi',
        'harga',
    ];

    public function Layanan(): BelongsTo {
        return $this->belongsTo(Layanan::class);
    }
}
