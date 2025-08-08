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
        'status',
        'error_message'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk URL file original
    public function getOriginalFileUrlAttribute()
    {
        if (!$this->original_file_path) {
            return null;
        }
        
        // Cek apakah file ada
        if (!Storage::exists($this->original_file_path)) {
            return null;
        }
        
        return Storage::url($this->original_file_path);
    }

    // Accessor untuk URL file signed
    public function getSignedFileUrlAttribute()
    {
        if (!$this->signed_file_path) {
            return null;
        }
        
        // Cek apakah file ada
        if (!Storage::exists($this->signed_file_path)) {
            return null;
        }
        
        return Storage::url($this->signed_file_path);
    }

    // Accessor untuk URL QR Code
    public function getQrCodeUrlAttribute()
    {
        if (!$this->qr_code_path) {
            return null;
        }
        
        // Cek apakah file ada
        if (!Storage::exists($this->qr_code_path)) {
            return null;
        }
        
        return Storage::url($this->qr_code_path);
    }

    // Accessor untuk URL public
    public function getPublicUrlAttribute()
    {
        return $this->public_link ? url($this->public_link) : null;
    }

    // Method untuk cek apakah file signed ada
    public function hasSignedFile(): bool
    {
        return $this->signed_file_path && Storage::exists($this->signed_file_path);
    }

    // Method untuk cek apakah file original ada
    public function hasOriginalFile(): bool
    {
        return $this->original_file_path && Storage::exists($this->original_file_path);
    }

    // Method untuk cek apakah QR code ada
    public function hasQrCode(): bool
    {
        return $this->qr_code_path && Storage::exists($this->qr_code_path);
    }

    // Method untuk mendapatkan path file signed yang benar
    public function getSignedFilePath(): ?string
    {
        if (!$this->signed_file_path) {
            return null;
        }
        
        return storage_path('app/' . $this->signed_file_path);
    }

    // Method untuk mendapatkan path file original yang benar  
    public function getOriginalFilePath(): ?string
    {
        if (!$this->original_file_path) {
            return null;
        }
        
        return storage_path('app/' . $this->original_file_path);
    }
}