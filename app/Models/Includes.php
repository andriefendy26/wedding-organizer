<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Includes extends Model
{
    use HasFactory;

    protected $table = 'tb_include';

    protected $fillable = [
        'paket_layanan_id',
        'nama_include'
    ];

    public function paketLayanan():BelongsTo {
        return $this->belongsTo(PaketLayanan::class);
    }
}
