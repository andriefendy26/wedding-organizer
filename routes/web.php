<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\instagram;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DocumentVerificationController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PublicLetterController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\LanguageController;
use App\Models\Artikel;
use App\Models\Portofolio;
use App\Models\Testimoni;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Language routes
Route::get('/language/{locale}', [LanguageController::class, 'changeLanguage'])->name('language.change');
Route::get('/api/language/current', [LanguageController::class, 'getCurrentLanguage'])->name('language.current');

// Demo route for multilanguage
Route::get('/multilanguage-demo', function () {
    return view('multilanguage-demo');
})->name('multilanguage.demo');

Route::get('/', [TestimoniController::class, 'index'])->name('home');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/faq', function () {
    return view('faq');
});

// Route untuk halaman kontak (GET)
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
// Route untuk submit form konsultasi (POST)
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');

// Route API (jika diperlukan untuk Ajax)
Route::prefix('api')->group(function () {
    Route::post('/konsultasi', [KonsultasiController::class, 'store']);
    Route::get('/konsultasi', [KonsultasiController::class, 'index']);
    Route::get('/konsultasi/{id}', [KonsultasiController::class, 'show']);
    Route::delete('/konsultasi/{id}', [KonsultasiController::class, 'destroy']);
    Route::get('/konsultasi-statistics', [KonsultasiController::class, 'statistics']);
});


Route::get('/tentang', function () {
    return view('tentangkami');
});

Route::get('/team', [ContentController::class, 'GetTeam'])->name('team');
Route::get('/team/{id}', [ContentController::class, 'getTeamMember'])->name('team.member'); // optional

Route::get('/galery', [PortofolioController::class, 'indexGalery'])->name('Galery');
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('Portofolio');

// route layanan
Route::get('/layanan', function () {
    return view('layanan');
});
// Route::get('/detaillayanan', function () {
//     return view('detaillayanan');
// });
// Route::get('/layanansewa', function () {
//     return view('sewabarang');
// });
Route::get('/layanansewa', [LayananController::class, 'IndexSewaBarang'])->name('sewa');
Route::get('/layananwedding', [LayananController::class, 'IndexWedding'])->name('wedding');

Route::get('/layanandekorasi', function () {
    return view('dekorasi');
});


Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');

Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');

Route::get('/bayar/{public_id}', [BayarController::class, 'show'])->name('bayar.show');
Route::post('/bayar/{public_id}', [BayarController::class, 'update'])->name('bayar.update');

// Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
Route::get('/kalender/events', [KalenderController::class, 'events'])->name('kalender.events');


Route::prefix('letters/public')->group(function () {
    Route::get('/{slug}', [PublicLetterController::class, 'show'])
        ->name('letters.public.show');
    
    Route::get('/{slug}/download', [PublicLetterController::class, 'download'])
        ->name('letters.public.download');
});

// routes/web.php
// Route::get('/letters/public/{slug}', [PublicLetterController::class, 'show'])->name('letters.public');
// Route::get('/letters/public/{slug}/download', [PublicLetterController::class, 'download'])->name('letters.public.download');


// sitemap

Route::get('/sitemap.xml', function () {
    $artikel = Artikel::latest()->get();
    // $category = artikel->tags;
    return response()->view('sitemap', compact('artikel'))->header('Content-Type','text/xml');
});
