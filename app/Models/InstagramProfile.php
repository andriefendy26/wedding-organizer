<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class InstagramProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'display_name',
        'bio',
        'profile_image',
        'website',
        'instagram_url',
        'posts_count',
        'followers_count',
        'following_count',
        'is_verified',
        'is_business',
        'is_active',
        'additional_info',
        'last_synced_at',
    ];

    protected $casts = [
        'posts_count' => 'integer',
        'followers_count' => 'integer',
        'following_count' => 'integer',
        'is_verified' => 'boolean',
        'is_business' => 'boolean',
        'is_active' => 'boolean',
        'additional_info' => 'array',
        'last_synced_at' => 'datetime',
    ];

    /**
     * Get the profile image URL attribute
     */
    protected function profileImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 
                $attributes['profile_image'] 
                    ? Storage::url($attributes['profile_image'])
                    : asset('images/default-avatar.png'),
        );
    }

    /**
     * Get the full Instagram URL
     */
    protected function fullInstagramUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 
                $attributes['instagram_url'] ?: "https://instagram.com/{$attributes['username']}",
        );
    }

    /**
     * Get formatted followers count
     */
    protected function followersFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatCount($this->followers_count),
        );
    }

    /**
     * Get formatted following count
     */
    protected function followingFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatCount($this->following_count),
        );
    }

    /**
     * Get formatted posts count
     */
    protected function postsFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatCount($this->posts_count),
        );
    }

    /**
     * Format large numbers
     */
    private function formatCount(int $count): string
    {
        if ($count >= 1000000) {
            return round($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return round($count / 1000, 1) . 'K';
        }
        
        return number_format($count);
    }

    /**
     * Scope for active profiles
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for verified profiles
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope for business profiles
     */
    public function scopeBusiness($query)
    {
        return $query->where('is_business', true);
    }

    /**
     * Get the main profile (you might want only one active profile)
     */
    public static function getMainProfile(): ?self
    {
        return static::where('is_active', true)->first();
    }

    /**
     * Relationship with Instagram Posts
     */
    public function posts()
    {
        return $this->hasMany(InstagramPost::class, 'profile_username', 'username');
    }
}