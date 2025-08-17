<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Surat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat';

    protected $fillable = [
        'jenis_surat',
        'nomor_surat',
        'nama_pemohon',
        'nik',
        'alamat',
        'keperluan',
        'tanggal_surat',
        'lampiran',
        'status',
        'template_id',
        'public_link',
        'qr_code_path',
        'pdf_path',
        'catatan_admin',
        'disetujui_oleh',
        'tanggal_disetujui',
        'ditolak_oleh',
        'tanggal_ditolak',
        'alasan_penolakan',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_disetujui' => 'date',
        'tanggal_ditolak' => 'date',
    ];

    // Status constants
    const STATUS_DIAJUKAN = 'diajukan';
    const STATUS_DISETUJUI = 'disetujui';
    const STATUS_DITOLAK = 'ditolak';

    // Jenis surat constants
    const JENIS_KETERANGAN = 'keterangan';
    const JENIS_PENGANTAR = 'pengantar';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($surat) {
            if (empty($surat->nomor_surat)) {
                $surat->nomor_surat = self::generateNomorSurat();
            }
            if (empty($surat->public_link)) {
                // Simpan hanya token, jangan sertakan path agar aman dipakai di route param
                $surat->public_link = Str::random(32);
            }
        });
    }

    public static function generateNomorSurat(): string
    {
        $year = date('Y');
        $month = date('m');
        $lastSurat = self::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();

        $sequence = $lastSurat ? (intval(substr($lastSurat->nomor_surat, -3)) + 1) : 1;

        return sprintf('%s/%s/%s/%03d', 'SURAT', $year, $month, $sequence);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(SuratTemplate::class, 'template_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditolak_oleh');
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            self::STATUS_DIAJUKAN => 'Diajukan',
            self::STATUS_DISETUJUI => 'Disetujui',
            self::STATUS_DITOLAK => 'Ditolak',
            default => 'Tidak Diketahui'
        };
    }

    public function getJenisSuratLabelAttribute(): string
    {
        return match($this->jenis_surat) {
            self::JENIS_KETERANGAN => 'Surat Keterangan',
            self::JENIS_PENGANTAR => 'Surat Pengantar',
            default => 'Tidak Diketahui'
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            self::STATUS_DIAJUKAN => 'warning',
            self::STATUS_DISETUJUI => 'success',
            self::STATUS_DITOLAK => 'danger',
            default => 'gray'
        };
    }

    public function getVerificationUrlAttribute(): string
    {
        // URL verifikasi publik menggunakan token aman (tanpa path)
        return route('surat.verify', ['publicLink' => $this->public_token]);
    }

    public function getPublicTokenAttribute(): string
    {
        // Ambil token terakhir setelah slash jika field lama masih menyimpan path lengkap
        $value = (string) $this->public_link;
        $pos = strrpos($value, '/');
        return $pos === false ? $value : substr($value, $pos + 1);
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_DISETUJUI;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_DITOLAK;
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_DIAJUKAN;
    }
}
