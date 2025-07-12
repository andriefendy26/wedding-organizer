<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $fillable = [
        'layanan_id',
        'foto',
        'nama',
        'deskripsi',
        'harga',
        'stock',
        'status',
    ];

    public function Layanan():BelongsTo 
    {
        return $this->BelongsTo(Layanan::class);
    }
}
