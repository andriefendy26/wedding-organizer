# Panduan Testing Modul E-Surat

## Persiapan Testing

### 1. Pastikan Database Siap

```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder
php artisan db:seed --class=SuratHeaderSeeder
php artisan db:seed --class=SuratTemplateSeeder
```

### 2. Pastikan Storage Link

```bash
php artisan storage:link
```

### 3. Login ke Admin Panel

-   Buka: `http://localhost:8000/admin`
-   Login dengan kredensial default:
    -   Email: `superadmin@example.com`
    -   Password: `superadmin`

## Testing Flow

### 1. Testing Header Surat

1. Buka menu "E-Surat" → "Header Surat"
2. Klik "Create" untuk membuat header baru
3. Isi data:
    - Nama Instansi: "PEMERINTAH KABUPATEN TEST"
    - Alamat: "Jl. Test No. 123, Kecamatan Test"
    - Telepon: "(021) 1234567"
    - Email: "test@example.com"
    - Website: "www.test.go.id"
4. Upload logo (opsional)
5. Set "Aktif" = true
6. Klik "Create"

### 2. Testing Template Surat

1. Buka menu "E-Surat" → "Template Surat"
2. Klik "Create" untuk membuat template baru
3. Isi data:
    - Nama Template: "Template Test Surat Keterangan"
    - Jenis Surat: "Surat Keterangan"
    - Template Default: true
    - Aktif: true
4. Isi konten template dengan placeholder:

```html
<div style="text-align: center;">
    <h2>SURAT KETERANGAN</h2>
    <p>Nomor: {nomor_surat}</p>
</div>
<p>Nama: {nama}</p>
<p>NIK: {nik}</p>
<p>Alamat: {alamat}</p>
<p>Keperluan: {keperluan}</p>
<p>Tanggal: {tanggal}</p>
```

5. Klik "Create"

### 3. Testing Pembuatan Surat

1. Buka menu "E-Surat" → "Surat"
2. Klik "Create" untuk membuat surat baru
3. Isi data pemohon:
    - Jenis Surat: "Surat Keterangan"
    - Nama Pemohon: "John Doe"
    - NIK: "1234567890123456"
    - Alamat: "Jl. Contoh No. 123, Jakarta"
    - Keperluan: "Pengurusan KTP"
    - Tanggal Surat: hari ini
4. Upload lampiran (opsional)
5. Klik "Create"

### 4. Testing Approval Surat

1. Di halaman list surat, cari surat yang baru dibuat
2. Klik tombol "Setujui" (icon centang hijau)
3. Isi catatan (opsional): "Surat disetujui"
4. Klik "Setujui"
5. Status surat akan berubah menjadi "Disetujui"

### 5. Testing Preview & Download

1. Setelah surat disetujui, klik tombol "Preview" (icon mata)
2. PDF akan terbuka di tab baru
3. Klik tombol "Download" (icon download)
4. File PDF akan terdownload

### 6. Testing QR Code Verification

1. Di halaman list surat, klik tombol "View" pada surat yang disetujui
2. Catat URL verifikasi yang muncul
3. Buka URL verifikasi di browser baru
4. Halaman verifikasi akan menampilkan detail surat
5. Klik "Download PDF" untuk download surat

## Testing API Endpoints

### 1. Testing Verifikasi Surat

```bash
# Ganti {publicLink} dengan link yang sebenarnya
curl http://localhost:8000/surat/verifikasi/{publicLink}
```

### 2. Testing Download PDF

```bash
# Ganti {publicLink} dengan link yang sebenarnya
curl http://localhost:8000/surat/download/{publicLink}
```

### 3. Testing Preview PDF

```bash
# Ganti {publicLink} dengan link yang sebenarnya
curl http://localhost:8000/surat/preview/{publicLink}
```

## Testing Error Cases

### 1. Testing Surat Tidak Ditemukan

1. Akses URL verifikasi dengan link yang tidak valid
2. Harus muncul error 404

### 2. Testing Download Surat Belum Disetujui

1. Buat surat baru tanpa approval
2. Coba download PDF
3. Harus muncul error 403

### 3. Testing Validasi Input

1. Coba buat surat dengan NIK kurang dari 16 digit
2. Coba buat surat dengan email tidak valid
3. Coba upload file dengan format tidak didukung
4. Harus muncul pesan error validasi

## Testing QR Code

### 1. Testing QR Code Generation

1. Buat surat baru dan setujui
2. Download PDF surat
3. Buka PDF dan cari QR Code di pojok kanan bawah
4. Scan QR Code dengan aplikasi QR Code scanner
5. Harus mengarah ke halaman verifikasi

### 2. Testing QR Code Content

1. Scan QR Code
2. URL yang muncul harus sesuai dengan format:
   `http://localhost:8000/surat/verifikasi/{32_character_hash}`

## Testing Bulk Actions

### 1. Testing Bulk Approval

1. Buat beberapa surat dengan status "Diajukan"
2. Pilih beberapa surat dengan checkbox
3. Klik "Setujui Terpilih"
4. Semua surat terpilih harus berubah status menjadi "Disetujui"

### 2. Testing Bulk Rejection

1. Buat beberapa surat dengan status "Diajukan"
2. Pilih beberapa surat dengan checkbox
3. Klik "Tolak Terpilih"
4. Isi alasan penolakan
5. Semua surat terpilih harus berubah status menjadi "Ditolak"

## Testing Template Placeholder

### 1. Testing Placeholder Replacement

1. Buat template dengan semua placeholder
2. Buat surat dengan data lengkap
3. Preview surat
4. Pastikan semua placeholder diganti dengan data yang benar

### 2. Testing Template Default

1. Buat template baru dengan "Template Default" = true
2. Buat surat baru dengan jenis surat yang sama
3. Template harus otomatis terpilih

## Checklist Testing

-   [ ] Header surat dapat dibuat dan diedit
-   [ ] Template surat dapat dibuat dengan placeholder
-   [ ] Surat dapat dibuat dengan data lengkap
-   [ ] Nomor surat otomatis generate
-   [ ] Status surat dapat diubah (Diajukan → Disetujui/Ditolak)
-   [ ] PDF dapat di-generate dan di-download
-   [ ] QR Code muncul di PDF
-   [ ] QR Code mengarah ke halaman verifikasi yang benar
-   [ ] Halaman verifikasi menampilkan data surat dengan benar
-   [ ] Bulk actions berfungsi
-   [ ] Validasi input berfungsi
-   [ ] Error handling berfungsi
-   [ ] File upload berfungsi
-   [ ] Storage link berfungsi

## Troubleshooting

### 1. QR Code tidak muncul

-   Cek apakah package QR Code terinstall
-   Cek permission storage
-   Restart queue worker

### 2. PDF tidak generate

-   Cek apakah package DomPDF terinstall
-   Cek memory limit PHP
-   Cek template HTML valid

### 3. File upload error

-   Cek permission storage
-   Cek max file size di php.ini
-   Cek disk space

### 4. Template tidak terpilih otomatis

-   Cek apakah template default sudah diset
-   Cek apakah template aktif
-   Cek relasi antara template dan jenis surat

