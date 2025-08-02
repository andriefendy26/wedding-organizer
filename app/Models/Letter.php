<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'penandatangan',
        'perihal',
        'original_file_path',
        'signed_file_path',
        'qr_code_path',
        'public_link',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getOriginalFileUrlAttribute()
    {
        return $this->original_file_path ? Storage::url($this->original_file_path) : null;
    }

    public function getSignedFileUrlAttribute()
    {
        return $this->signed_file_path ? Storage::url($this->signed_file_path) : null;
    }

    public function getQrCodeUrlAttribute()
    {
        return $this->qr_code_path ? Storage::url($this->qr_code_path) : null;
    }

    public function getPublicUrlAttribute()
    {
        return $this->public_link ? url($this->public_link) : null;
    }
}