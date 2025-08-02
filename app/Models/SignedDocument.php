<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SignedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'perihal',
        'penandatangan',
        'tanggal_ttd',
        'file_path',
        'verification_code',
        'hash',
        'signature_position',
        'qr_data',
        'file_size',
        'original_filename'
    ];

    protected $casts = [
        'tanggal_ttd' => 'datetime',
        'signature_position' => 'array',
        'qr_data' => 'array'
    ];

    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }

    public function getVerificationUrlAttribute()
    {
        return url("/verify-document/{$this->verification_code}");
    }

    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return 'Unknown';
        
        $bytes = (int) $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeByNoSurat($query, $noSurat)
    {
        return $query->where('no_surat', 'like', "%{$noSurat}%");
    }
}