<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BidanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\VariabelController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('dashboard');
    })->name('home');

    Route::resource('bidan', BidanController::class);

    Route::resource('orangtua', OrangTuaController::class);
    Route::get('orangtua/{id}/create-balita', [OrangTuaController::class, 'createBalita'])->name('catatan-kelahiran.create');

    Route::resource('posyandu', PosyanduController::class);

    Route::resource('jadwal', JadwalController::class);

    Route::resource('balita', BalitaController::class);

    Route::resource('variabel', VariabelController::class);
});
