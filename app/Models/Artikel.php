<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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

      /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });

        static::updating(function ($artikel) {
            if ($artikel->isDirty('judul') && empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });
    }

    /**
     * Get article excerpt
     */
    public function getExcerptAttribute($length = 150)
    {
        return Str::limit(strip_tags($this->content), $length);
    }

    /**
     * Get reading time in minutes
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return ceil($wordCount / 200); // 200 words per minute
    }

    /**
     * Get formatted tags
     */
    public function getFormattedTagsAttribute()
    {
        if (is_string($this->tags)) {
            return json_decode($this->tags, true) ?? [];
        }
        return $this->tags ?? [];
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return null;
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d F Y');
    }

}
