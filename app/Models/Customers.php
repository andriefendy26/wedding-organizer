<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = "tb_customers";
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'telpon',
        'alamat',
        'NIK',
        'foto_ktp',
    ];
    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'customer_id');
    }
}
