<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = "tb_galery";

    protected $fillable = [
        'portofolio_id',
        'foto',
        'nama',
        'deskripsi',
    ];

    public function portofolio()
    {
        return $this->belongsTo('App\Models\Portofolio', 'portofolio_id');
    }
}
