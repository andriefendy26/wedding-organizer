<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderKetersediaan extends Model
{
    use HasFactory;

    protected $table = 'tb_kalender_ketersediaan';

    protected $fillable = [
        'tanggal',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
