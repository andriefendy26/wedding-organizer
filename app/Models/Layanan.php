<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'tb_layanan';

    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function paketLayanan(): HasMany{
        return $this->HasMany(PaketLayanan::class);
    }

}
