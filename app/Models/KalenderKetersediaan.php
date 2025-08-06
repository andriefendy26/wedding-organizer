<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderKetersediaan extends Model
{   
    use HasFactory;

    protected $table = 'tb_kalender_ketersediaan';

    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'catatan',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
