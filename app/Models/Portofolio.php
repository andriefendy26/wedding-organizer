<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = "tb_portofolio";

    protected $fillable  = [
        'layanan_id',
        'judul',
        'kategori',
        'deskripsi',
        'url',
        'tanggal_event',
    ];


    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan', 'layanan_id');
    }

    public function galery()
    {
        return $this->hasMany(\App\Models\Galery::class, 'portofolio_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
