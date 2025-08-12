# Setup Sistem Multi Bahasa - Wedding Organizer

## Instalasi dan Setup

### 1. File yang Telah Dibuat

#### File Terjemahan

-   `lang/id/auth.php` - Pesan autentikasi bahasa Indonesia
-   `lang/id/pagination.php` - Navigasi halaman bahasa Indonesia
-   `lang/id/passwords.php` - Pesan reset password bahasa Indonesia
-   `lang/id/validation.php` - Pesan validasi bahasa Indonesia
-   `lang/id/app.php` - Terjemahan aplikasi utama bahasa Indonesia
-   `lang/en/app.php` - Terjemahan aplikasi utama bahasa Inggris

#### Middleware dan Controller

-   `app/Http/Middleware/SetLocale.php` - Middleware untuk mengatur bahasa
-   `app/Http/Controllers/LanguageController.php` - Controller untuk mengelola bahasa
-   `app/Helpers/LanguageHelper.php` - Helper untuk fungsi bahasa

#### Routes

-   `GET /language/{locale}` - Route untuk ganti bahasa
-   `GET /api/language/current` - API untuk mendapatkan bahasa saat ini
-   `GET /multilanguage-demo` - Halaman demo multi bahasa

#### Konfigurasi

-   Middleware `SetLocale` telah ditambahkan ke grup `web`
-   Bahasa default diubah ke `id` (Indonesia) di `config/app.php`
-   Helper `LanguageHelper` telah didaftarkan di `composer.json`

### 2. Langkah Setup

#### Step 1: Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

#### Step 2: Dump Autoload

```bash
composer dump-autoload
```

#### Step 3: Test Sistem

1. Buka website
2. Klik language switcher di header
3. Pilih bahasa yang berbeda
4. Verifikasi konten berubah

### 3. Cara Penggunaan

#### Menggunakan Terjemahan di View

```php
{{ __('app.home') }}           // Beranda / Home
{{ __('app.contact') }}        // Kontak / Contact
{{ __('app.services') }}       // Layanan / Services
```

#### Menggunakan Terjemahan di Controller

```php
use Illuminate\Support\Facades\App;

// Set bahasa
App::setLocale('id'); // Bahasa Indonesia
App::setLocale('en'); // Bahasa Inggris

// Gunakan terjemahan
$message = __('app.success');
```

#### Menggunakan Helper

```php
use App\Helpers\LanguageHelper;

// Dapatkan bahasa yang tersedia
$languages = LanguageHelper::getAvailableLanguages();

// Dapatkan bahasa saat ini
$currentLang = LanguageHelper::getCurrentLanguage();

// Set bahasa
LanguageHelper::setLanguage('en');
```

### 4. Menambahkan Terjemahan Baru

#### Step 1: Tambahkan di file terjemahan

```php
// Di lang/en/app.php
'new_key' => 'English Text',

// Di lang/id/app.php
'new_key' => 'Teks Indonesia',
```

#### Step 2: Gunakan di view

```php
{{ __('app.new_key') }}
```

### 5. Menambahkan Bahasa Baru

#### Step 1: Buat direktori bahasa baru

```bash
mkdir lang/ja
```

#### Step 2: Salin file terjemahan

```bash
cp lang/en/* lang/ja/
```

#### Step 3: Update LanguageHelper

```php
// Di app/Helpers/LanguageHelper.php
public static function getAvailableLanguages()
{
    return [
        'en' => [...],
        'id' => [...],
        'ja' => [
            'code' => 'ja',
            'name' => 'Japanese',
            'flag' => 'https://flagcdn.com/w20/jp.png',
            'native_name' => '日本語'
        ]
    ];
}
```

#### Step 4: Update SetLocale middleware

```php
// Di app/Http/Middleware/SetLocale.php
$availableLocales = ['en', 'id', 'ja'];
```

### 6. Testing

#### Test Language Switcher

1. Buka `/multilanguage-demo`
2. Klik tombol bahasa
3. Verifikasi konten berubah

#### Test API

```bash
curl http://localhost/api/language/current
```

#### Test Session Persistence

1. Ganti bahasa
2. Refresh halaman
3. Verifikasi bahasa tetap sama

### 7. Troubleshooting

#### Terjemahan tidak muncul

```bash
php artisan cache:clear
php artisan config:clear
```

#### Language switcher tidak berfungsi

-   Pastikan route terdaftar: `php artisan route:list | grep language`
-   Pastikan middleware aktif
-   Check browser console untuk error JavaScript

#### Session tidak tersimpan

-   Pastikan session driver dikonfigurasi dengan benar
-   Check file permissions untuk storage

### 8. Fitur yang Sudah Diterjemahkan

#### Navigation & Header

-   Menu navigasi (Home, Pages, About Us, Services, Gallery, Portfolio, Our Team, Articles, FAQ, Calendar, Contact)
-   Brand text (Event Organizer, Wedding Organizer)
-   Language switcher

#### Footer

-   Deskripsi perusahaan
-   Layanan (Wedding Organizer, Event Organizer, Equipment Rental, Documentation)
-   Informasi kontak
-   Newsletter subscription
-   Testimonial
-   Privacy policy, Terms & Conditions

#### Alerts & Messages

-   Success messages
-   Error messages
-   Validation error messages
-   WhatsApp message template

#### Buttons & Actions

-   Contact Us
-   Learn More
-   View Details
-   Book Now
-   Get Quote
-   Send Message
-   Subscribe

### 9. File Dokumentasi

-   `MULTILANGUAGE_README.md` - Dokumentasi lengkap sistem multi bahasa
-   `MULTILANGUAGE_SETUP.md` - Instruksi setup dan penggunaan

### 10. Dependencies

-   Laravel 10.x
-   Alpine.js (untuk language switcher)
-   Font Awesome (untuk icons)

### 11. Support

Untuk pertanyaan atau masalah terkait sistem multi bahasa, silakan hubungi tim development.
