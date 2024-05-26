<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BalitaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\PemeriksaanController;
use App\Http\Controllers\Api\PosyanduController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::apiResource('/jadwals', JadwalController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/balitas', [BalitaController::class, 'index']);

    Route::get('/jadwals', [JadwalController::class, 'index']);
    Route::get('/jadwals/{jadwal_id}', [JadwalController::class, 'getListPemeriksaanByJadwal']);

    //post pemeriksaan
    Route::post('/post-pemeriksaan', [PemeriksaanController::class, 'postPemeriksaan']);

    //get all posyandu
    Route::get('/posyandu-by-bidan', [PosyanduController::class, 'getPosyanduByBidan']);
});
