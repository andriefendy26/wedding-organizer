<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class InstagramPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'href',
        'img',
        'like',
        'comment',
        'is_active'
    ];

    protected $casts = [
        'like' => 'integer',
        'comment' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the image URL attribute
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['img'] ? asset($attributes['img']) : null,
        );
    }

    /**
     * Scope for active posts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get posts ordered by likes
     */
    public function scopeOrderByLikes($query, $direction = 'desc')
    {
        return $query->orderBy('like', $direction);
    }

    /**
     * Get posts ordered by comments
     */
    public function scopeOrderByComments($query, $direction = 'desc')
    {
        return $query->orderBy('comment', $direction);
    }
}