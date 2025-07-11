<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'tb_artikel';

    protected $fillable = [
        'slug',
        'judul',
        'sub_judul',
        'content',
        'gambar',
        'tags',
        'author',
        'user_id'
    ];

    protected $casts = [
        'tags' => 'string',
    ];

    public function User(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
