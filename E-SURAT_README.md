# Modul E-Surat - Laravel Filament

Modul E-Surat adalah sistem pengelolaan surat digital yang terintegrasi dengan Laravel Filament. Sistem ini memungkinkan pengguna untuk membuat, mengelola, dan memverifikasi surat dengan fitur QR Code untuk validasi keaslian.

## Fitur Utama

### 1. Jenis Surat

-   **Surat Keterangan**: Surat keterangan umum
-   **Surat Pengantar**: Surat pengantar untuk berbagai keperluan

### 2. CRUD Pengajuan Surat

-   Form input lengkap dengan validasi
-   Upload lampiran opsional
-   Nomor surat otomatis
-   Status surat (Diajukan, Disetujui, Ditolak)

### 3. Preview & Download PDF

-   Generate PDF otomatis dengan template
-   Preview surat sebelum download
-   Download surat yang sudah disetujui

### 4. Header Surat Konfigurasi

-   Logo instansi
-   Nama dan alamat instansi
-   Informasi kontak
-   Kop surat kustom

### 5. Template Surat Dinamis

-   Template HTML dengan placeholder
-   Placeholder otomatis diganti dengan data
-   Multiple template per jenis surat

### 6. Validasi QR Code

-   QR Code otomatis di-generate
-   Link verifikasi unik per surat
-   Halaman verifikasi publik

## Struktur Database

### Tabel `surat_headers`

```sql
- id (Primary Key)
- nama_instansi
- alamat_instansi
- telepon
- email
- website
- logo_path
- kop_surat
- is_active
- timestamps
```

### Tabel `surat_templates`

```sql
- id (Primary Key)
- nama_template
- jenis_surat (enum: keterangan, pengantar)
- konten_template (longtext)
- is_default
- is_active
- timestamps
```

### Tabel `surat`

```sql
- id (Primary Key)
- jenis_surat (enum: keterangan, pengantar)
- nomor_surat (unique)
- nama_pemohon
- nik (16 digit)
- alamat
- keperluan
- tanggal_surat
- lampiran (nullable)
- status (enum: diajukan, disetujui, ditolak)
- template_id (foreign key)
- public_link (unique)
- qr_code_path
- pdf_path
- catatan_admin
- disetujui_oleh (foreign key)
- tanggal_disetujui
- ditolak_oleh (foreign key)
- tanggal_ditolak
- alasan_penolakan
- timestamps
```

## Instalasi

### 1. Jalankan Migration

```bash
php artisan migrate
```

### 2. Jalankan Seeder

```bash
php artisan db:seed --class=SuratHeaderSeeder
php artisan db:seed --class=SuratTemplateSeeder
```

### 3. Pastikan Storage Link

```bash
php artisan storage:link
```

## Penggunaan

### 1. Akses Admin Panel

-   Login ke Filament Admin Panel
-   Navigasi ke menu "E-Surat"

### 2. Kelola Header Surat

-   Buka menu "Header Surat"
-   Tambah/edit informasi instansi
-   Upload logo (opsional)
-   Set header sebagai aktif

### 3. Kelola Template Surat

-   Buka menu "Template Surat"
-   Buat template baru atau edit yang ada
-   Gunakan placeholder: `{nama}`, `{nik}`, `{alamat}`, `{keperluan}`, `{tanggal}`, `{nomor_surat}`, `{jenis_surat}`
-   Set template sebagai default

### 4. Kelola Surat

-   Buka menu "Surat"
-   Buat surat baru dengan data pemohon
-   Pilih jenis surat dan template
-   Upload lampiran (opsional)
-   Setujui/tolak surat

### 5. Verifikasi Surat

-   Scan QR Code pada surat
-   Atau akses link verifikasi langsung
-   Lihat detail surat dan status

## API Endpoints

### Verifikasi Surat

```
GET /surat/verifikasi/{publicLink}
```

### Download PDF

```
GET /surat/download/{publicLink}
```

### Preview PDF

```
GET /surat/preview/{publicLink}
```

## Placeholder Template

Template surat mendukung placeholder berikut:

| Placeholder     | Deskripsi       | Contoh Output        |
| --------------- | --------------- | -------------------- |
| `{nama}`        | Nama pemohon    | "John Doe"           |
| `{nik}`         | NIK pemohon     | "1234567890123456"   |
| `{alamat}`      | Alamat pemohon  | "Jl. Contoh No. 123" |
| `{keperluan}`   | Keperluan surat | "Pengurusan KTP"     |
| `{tanggal}`     | Tanggal surat   | "15 Januari 2025"    |
| `{nomor_surat}` | Nomor surat     | "SURAT/2025/01/001"  |
| `{jenis_surat}` | Jenis surat     | "Surat Keterangan"   |

## Contoh Template

### Surat Keterangan

```html
<div style="text-align: center; margin-bottom: 30px;">
    <h2 style="margin: 0; font-size: 18px; font-weight: bold;">
        SURAT KETERANGAN
    </h2>
    <p style="margin: 5px 0; font-size: 14px;">Nomor: {nomor_surat}</p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Yang bertanda tangan di bawah ini, Kepala Desa/Kelurahan, menerangkan
        bahwa:
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
        Adalah benar-benar warga yang berdomisili di wilayah kami dan surat
        keterangan ini dibuat untuk keperluan: <strong>{keperluan}</strong>
    </p>
</div>

<div style="margin-bottom: 20px;">
    <p style="text-align: justify; line-height: 1.6; margin: 0;">
        Demikian surat keterangan ini dibuat untuk dapat dipergunakan
        sebagaimana mestinya.
    </p>
</div>

<div style="text-align: right; margin-top: 50px;">
    <p style="margin: 0;">{tanggal}</p>
    <p style="margin: 5px 0;">Kepala Desa/Kelurahan,</p>
    <br /><br /><br />
    <p style="margin: 0; font-weight: bold;">(Nama Kepala Desa/Kelurahan)</p>
</div>
```

## Keamanan

### 1. Validasi Input

-   Validasi NIK 16 digit
-   Validasi email format
-   Validasi file upload
-   Sanitasi input HTML

### 2. QR Code Security

-   Link verifikasi unik per surat
-   Hash 32 karakter random
-   Tidak dapat ditebak

### 3. File Security

-   File disimpan di storage terpisah
-   Validasi tipe file
-   Batasan ukuran file

## Troubleshooting

### 1. QR Code tidak muncul

-   Pastikan package QR Code terinstall
-   Cek permission storage
-   Restart queue worker

### 2. PDF tidak generate

-   Pastikan package DomPDF terinstall
-   Cek memory limit PHP
-   Cek template HTML valid

### 3. File upload error

-   Cek permission storage
-   Cek max file size
-   Cek disk space

## Dependencies

-   Laravel 10+
-   Filament 3+
-   DomPDF
-   Simple QR Code
-   ImageMagick (untuk logo)

## License

MIT License - bebas digunakan untuk keperluan komersial dan non-komersial.

