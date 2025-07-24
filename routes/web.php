<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayarController;
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
    return view('home');
});


Route::get('/bayar/{public_id}', [BayarController::class, 'show'])->name('bayar.show');
Route::post('/bayar/{public_id}', [BayarController::class, 'update'])->name('bayar.update');

Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
Route::get('/kalender/events', [KalenderController::class, 'events'])->name('kalender.events');