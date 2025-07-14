<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PaketInclude extends Model
{
    use HasFactory;
    
    public $incrementing = true;
        
    protected $table = 'tb_paket_include';

    protected $fillable = [
        'paket_layanan_id',
        'include_id'
    ];

    public function paketLayanan():BelongsTo {
        return $this->belongsTo(PaketLayanan::class);
    }

    public function Include():belongsTo {
        return $this->belongsTo(Includes::class);
    }
}
