<?php

namespace Database\Seeders;

use App\Models\SuratTemplate;
use Illuminate\Database\Seeder;

class SuratTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Template Surat Keterangan
        SuratTemplate::create([
            'nama_template' => 'Template Surat Keterangan Default',
            'jenis_surat' => 'keterangan',
            'konten_template' => '<div style="text-align: center; margin-bottom: 30px;">
    <h2 style="margin: 0; font-size: 18px; font-weight: bold;">SURAT KETERANGAN</h2>
    <p style="margin: 5px 0; font-size: 14px;">Nomor: {nomor_surat}</p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Yang bertanda tangan di bawah ini, Kepala Desa/Kelurahan, menerangkan bahwa:
    </p>
</div>

<div style="margin-bottom: 20px;">
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 150px; padding: 5px 0;">Nama</td>
            <td style="padding: 5px 0;">: {nama}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0;">NIK</td>
            <td style="padding: 5px 0;">: {nik}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0;">Alamat</td>
            <td style="padding: 5px 0;">: {alamat}</td>
        </tr>
    </table>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Adalah benar-benar warga yang berdomisili di wilayah kami dan surat keterangan ini dibuat untuk keperluan: <strong>{keperluan}</strong>
    </p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
    </p>
</div>

<div style="text-align: right; margin-top: 50px;">
    <p style="margin: 0;">{tanggal}</p>
    <p style="margin: 5px 0;">Kepala Desa/Kelurahan,</p>
    <br><br><br>
    <p style="margin: 0; font-weight: bold;">(Nama Kepala Desa/Kelurahan)</p>
</div>',
            'is_default' => true,
            'is_active' => true,
        ]);

        // Template Surat Pengantar
        SuratTemplate::create([
            'nama_template' => 'Template Surat Pengantar Default',
            'jenis_surat' => 'pengantar',
            'konten_template' => '<div style="text-align: center; margin-bottom: 30px;">
    <h2 style="margin: 0; font-size: 18px; font-weight: bold;">SURAT PENGANTAR</h2>
    <p style="margin: 5px 0; font-size: 14px;">Nomor: {nomor_surat}</p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Yang bertanda tangan di bawah ini, Kepala Desa/Kelurahan, menerangkan bahwa:
    </p>
</div>

<div style="margin-bottom: 20px;">
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 150px; padding: 5px 0;">Nama</td>
            <td style="padding: 5px 0;">: {nama}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0;">NIK</td>
            <td style="padding: 5px 0;">: {nik}</td>
        </tr>
        <tr>
            <td style="padding: 5px 0;">Alamat</td>
            <td style="padding: 5px 0;">: {alamat}</td>
        </tr>
    </table>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Adalah benar-benar warga yang berdomisili di wilayah kami dan surat pengantar ini dibuat untuk keperluan: <strong>{keperluan}</strong>
    </p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
    </p>
</div>

<div style="text-align: right; margin-top: 50px;">
    <p style="margin: 0;">{tanggal}</p>
    <p style="margin: 5px 0;">Kepala Desa/Kelurahan,</p>
    <br><br><br>
    <p style="margin: 0; font-weight: bold;">(Nama Kepala Desa/Kelurahan)</p>
</div>',
            'is_default' => true,
            'is_active' => true,
        ]);
    }
}

