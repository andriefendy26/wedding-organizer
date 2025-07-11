<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemInclude extends Model
{
    use HasFactory;
    
    protected $table = 'tb_item_include';

    protected $fillable = [
        'include_id',
        'nama_item'
    ];

    public function Includes():BelongsTo {
        return $this->belongsTo(Includes::class);
    }
    
}
