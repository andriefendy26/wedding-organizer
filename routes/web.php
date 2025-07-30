<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\instagram;
use App\Http\Controllers\KalenderController;

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

Route::get('/', function () {


    $topTestimonials = [
        [
            'name' => 'Jack',
            'handle' => '@jack',
            'message' => "I've never seen anything like this before. It's amazing. I love it.",
            'avatar_bg' => 'bg-gradient-to-r from-green-400 to-blue-500'
        ],
        [
            'name' => 'Jill',
            'handle' => '@jill',
            'message' => "I don't know what to say. I'm speechless. This is amazing.",
            'avatar_bg' => 'bg-gradient-to-r from-purple-500 to-pink-500'
        ],
        [
            'name' => 'John',
            'handle' => '@john',
            'message' => "I'm at a loss for words. This is amazing. I love it.",
            'avatar_bg' => 'bg-gradient-to-r from-yellow-400 to-green-500'
        ]
    ];

    $bottomTestimonials = [
        [
            'name' => 'Jenny',
            'handle' => '@jenny',
            'message' => "I'm at a loss for words. This is amazing. I love it.",
            'avatar_bg' => 'bg-gradient-to-r from-orange-400 to-red-500'
        ],
        [
            'name' => 'James',
            'handle' => '@james',
            'message' => "I'm at a loss for words. This is amazing. I love it.",
            'avatar_bg' => 'bg-gradient-to-r from-blue-500 to-green-500'
        ]
    ];

    return view('home', compact('topTestimonials', 'bottomTestimonials'));


    // return view('home');
});
Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/detailartikel', function () {
    return view('detailartikel');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/tentang', function () {
    return view('tentangkami');
});

Route::get('/tim', function () {
    return view('timkami');
});
Route::get('/portofolio', function () {
    return view('portofolio');
});


// route layanan
Route::get('/layanan', function () {
    return view('layanan');
});
Route::get('/layanansewa', function () {
    return view('sewabarang');
});


// Route::get('/kalenderketerse', function () {
//     return view('kalender');
// });
Route::get('/kalender', [KalenderController::class, 'kalender'])->name('kalender.index');


Route::get('/bayar/{public_id}', [BayarController::class, 'show'])->name('bayar.show');
Route::post('/bayar/{public_id}', [BayarController::class, 'update'])->name('bayar.update');

Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
Route::get('/kalender/events', [KalenderController::class, 'events'])->name('kalender.events');