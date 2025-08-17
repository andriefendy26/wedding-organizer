<?php

namespace Database\Seeders;

use App\Models\SuratHeader;
use Illuminate\Database\Seeder;

class SuratHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuratHeader::create([
            'nama_instansi' => 'PEMERINTAH KABUPATEN CONTOH',
            'alamat_instansi' => 'Jl. Raya Utama No. 123, Kecamatan Contoh, Kabupaten Contoh, Provinsi Contoh 12345',
            'telepon' => '(021) 1234567',
            'email' => 'info@contoh.go.id',
            'website' => 'www.contoh.go.id',
            'kop_surat' => 'PEMERINTAH KABUPATEN CONTOH
Jl. Raya Utama No. 123, Kecamatan Contoh
Kabupaten Contoh, Provinsi Contoh 12345
Telp: (021) 1234567 | Email: info@contoh.go.id | Website: www.contoh.go.id',
            'is_active' => true,
        ]);
    }
}
