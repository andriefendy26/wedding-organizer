<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = "tb_konsultasi";

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'deskripsi',
        'tanggal',
    ];
}
