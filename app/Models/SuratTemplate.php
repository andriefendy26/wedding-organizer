<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_templates';

    protected $fillable = [
        'nama_template',
        'jenis_surat',
        'konten_template',
        'is_default',
        'is_active',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Jenis surat constants
    const JENIS_KETERANGAN = 'keterangan';
    const JENIS_PENGANTAR = 'pengantar';

    public function getJenisSuratLabelAttribute(): string
    {
        return match($this->jenis_surat) {
            self::JENIS_KETERANGAN => 'Surat Keterangan',
            self::JENIS_PENGANTAR => 'Surat Pengantar',
            default => 'Tidak Diketahui'
        };
    }

    public function surat()
    {
        return $this->hasMany(Surat::class, 'template_id');
    }

    public function replacePlaceholders(array $data): string
    {
        $content = $this->konten_template;
        
        $placeholders = [
            '{nama}' => $data['nama_pemohon'] ?? '',
            '{nik}' => $data['nik'] ?? '',
            '{alamat}' => $data['alamat'] ?? '',
            '{keperluan}' => $data['keperluan'] ?? '',
            '{tanggal}' => $data['tanggal_surat'] ?? '',
            '{nomor_surat}' => $data['nomor_surat'] ?? '',
            '{jenis_surat}' => $data['jenis_surat'] ?? '',
        ];

        foreach ($placeholders as $placeholder => $value) {
            if (is_string($value) && $value instanceof \Carbon\Carbon) {
                $value = $value->format('d F Y');
            }
            $content = str_replace($placeholder, $value, $content);
        }

        return $content;
    }

    public static function getDefaultTemplate(string $jenisSurat): ?self
    {
        return self::where('jenis_surat', $jenisSurat)
            ->where('is_default', true)
            ->where('is_active', true)
            ->first();
    }
}

