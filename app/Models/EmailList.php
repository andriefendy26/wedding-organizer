<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'tags'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}