<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'tb_testimoni';

    protected $fillable = [
        'user_id',
        'foto',
        'nama',
        'rating',
        'deskripsi',
    ];
}
