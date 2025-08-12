# Sistem Multi Bahasa - Wedding Organizer

Sistem multi bahasa telah berhasil diimplementasikan untuk aplikasi Wedding Organizer dengan dukungan bahasa Indonesia dan Inggris.

## Fitur yang Tersedia

### 1. Dukungan Bahasa

-   **Bahasa Indonesia (id)** - Bahasa default
-   **Bahasa Inggris (en)** - Bahasa internasional

### 2. Komponen yang Sudah Diterjemahkan

#### Navigation & Header

-   Menu navigasi (Home, Pages, About Us, Services, Gallery, Portfolio, Our Team, Articles, FAQ, Calendar, Contact)
-   Brand text (Event Organizer, Wedding Organizer)
-   Language switcher dengan flag dan dropdown

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

### 3. File Terjemahan

#### Bahasa Indonesia (`lang/id/`)

-   `auth.php` - Pesan autentikasi
-   `pagination.php` - Navigasi halaman
-   `passwords.php` - Pesan reset password
-   `validation.php` - Pesan validasi
-   `app.php` - Terjemahan aplikasi utama

#### Bahasa Inggris (`lang/en/`)

-   `auth.php` - Authentication messages
-   `pagination.php` - Pagination navigation
-   `passwords.php` - Password reset messages
-   `validation.php` - Validation messages
-   `app.php` - Main application translations

## Cara Penggunaan

### 1. Menggunakan Terjemahan di View

```php
{{ __('app.home') }}           // Beranda / Home
{{ __('app.contact') }}        // Kontak / Contact
{{ __('app.services') }}       // Layanan / Services
```

### 2. Menggunakan Terjemahan di Controller

```php
use Illuminate\Support\Facades\App;

// Set bahasa
App::setLocale('id'); // Bahasa Indonesia
App::setLocale('en'); // Bahasa Inggris

// Gunakan terjemahan
$message = __('app.success');
```

### 3. Menggunakan Helper

```php
use App\Helpers\LanguageHelper;

// Dapatkan bahasa yang tersedia
$languages = LanguageHelper::getAvailableLanguages();

// Dapatkan bahasa saat ini
$currentLang = LanguageHelper::getCurrentLanguage();

// Set bahasa
LanguageHelper::setLanguage('en');
```

### 4. Route untuk Ganti Bahasa

```
GET /language/{locale}
```

Contoh:

-   `/language/en` - Ganti ke bahasa Inggris
-   `/language/id` - Ganti ke bahasa Indonesia

## Struktur File

```
lang/
├── en/
│   ├── auth.php
│   ├── pagination.php
│   ├── passwords.php
│   ├── validation.php
│   └── app.php
└── id/
    ├── auth.php
    ├── pagination.php
    ├── passwords.php
    ├── validation.php
    └── app.php

app/
├── Http/
│   ├── Controllers/
│   │   └── LanguageController.php
│   └── Middleware/
│       └── SetLocale.php
└── Helpers/
    └── LanguageHelper.php
```

## Middleware

### SetLocale Middleware

Middleware ini secara otomatis mengatur bahasa aplikasi berdasarkan session. Ditambahkan ke grup middleware 'web' sehingga berjalan di setiap request.

## Controller

### LanguageController

-   `changeLanguage($locale)` - Mengubah bahasa dan redirect kembali
-   `getCurrentLanguage()` - Mendapatkan informasi bahasa saat ini (API)

## Helper

### LanguageHelper

-   `getAvailableLanguages()` - Daftar bahasa yang tersedia
-   `getCurrentLanguage()` - Bahasa saat ini
-   `setLanguage($locale)` - Set bahasa
-   `getLanguageName($code)` - Nama bahasa berdasarkan kode
-   `isRTL($locale)` - Cek apakah bahasa RTL
-   `getDirection($locale)` - Arah bahasa (ltr/rtl)

## Menambahkan Terjemahan Baru

### 1. Tambahkan di file `lang/en/app.php` dan `lang/id/app.php`

```php
// Di lang/en/app.php
'new_key' => 'English Text',

// Di lang/id/app.php
'new_key' => 'Teks Indonesia',
```

### 2. Gunakan di view

```php
{{ __('app.new_key') }}
```

## Menambahkan Bahasa Baru

### 1. Buat direktori bahasa baru

```
lang/ja/  // Untuk bahasa Jepang
```

### 2. Salin file terjemahan dari bahasa yang ada

```
lang/ja/auth.php
lang/ja/pagination.php
lang/ja/passwords.php
lang/ja/validation.php
lang/ja/app.php
```

### 3. Update LanguageHelper

```php
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

### 4. Update SetLocale middleware

```php
$availableLocales = ['en', 'id', 'ja'];
```

## Testing

### 1. Test Language Switcher

1. Buka website
2. Klik language switcher di header
3. Pilih bahasa yang berbeda
4. Verifikasi bahwa konten berubah

### 2. Test Session Persistence

1. Ganti bahasa
2. Refresh halaman
3. Verifikasi bahasa tetap sama

### 3. Test API

```
GET /api/language/current
```

## Troubleshooting

### 1. Terjemahan tidak muncul

-   Pastikan file terjemahan ada di direktori yang benar
-   Pastikan key terjemahan benar
-   Clear cache: `php artisan cache:clear`

### 2. Language switcher tidak berfungsi

-   Pastikan route terdaftar
-   Pastikan middleware SetLocale aktif
-   Check browser console untuk error JavaScript

### 3. Session tidak tersimpan

-   Pastikan session driver dikonfigurasi dengan benar
-   Check file permissions untuk storage

## Best Practices

1. **Gunakan key yang deskriptif** - `app.wedding_organizer_service` lebih baik dari `app.wos`
2. **Kelompokkan terjemahan** - Gunakan prefix seperti `app.`, `auth.`, `validation.`
3. **Gunakan parameter** - Untuk teks dinamis: `'welcome' => 'Welcome, :name!'`
4. **Test semua bahasa** - Pastikan semua fitur berfungsi di kedua bahasa
5. **Backup terjemahan** - Simpan backup file terjemahan

## Dependencies

-   Laravel 10.x
-   Alpine.js (untuk language switcher)
-   Font Awesome (untuk icons)

## Support

Untuk pertanyaan atau masalah terkait sistem multi bahasa, silakan hubungi tim development.
