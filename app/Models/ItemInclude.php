<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ItemInclude extends Model
{
    use HasFactory;
    
    protected $table = 'tb_item_include';

    protected $fillable = [
        'include_id',
        'nama_item'
    ];

    public function Include():BelongsTo {
        return $this->belongsTo(Includes::class);
    }
    
}
