<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_headers';

    protected $fillable = [
        'nama_instansi',
        'alamat_instansi',
        'telepon',
        'email',
        'website',
        'logo_path',
        'kop_surat',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        if ($this->logo_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->logo_path)) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($this->logo_path);
        }
        return null;
    }

    public static function getActive(): ?self
    {
        return self::where('is_active', true)->first();
    }

    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->alamat_instansi,
            $this->telepon ? "Telp: {$this->telepon}" : null,
            $this->email ? "Email: {$this->email}" : null,
            $this->website ? "Website: {$this->website}" : null,
        ]);

        return implode("\n", $parts);
    }
}
