<?php

use App\Http\Controllers\BidanController;
use App\Http\Controllers\OrangTuaController;
use App\Models\Bidan;
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
});
