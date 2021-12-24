<?php

use App\Http\Controllers\AlternatifBansosController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBansosController;
use App\Http\Controllers\KriteriaBansosController;
use App\Http\Controllers\NilaiAlternatifController;
use App\Http\Controllers\PerbandinganKriteriaController;
use App\Http\Controllers\PerbandinganSubKriteriaController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);
// Homepage
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

// jenis bansos
Route::middleware('auth')->prefix('master')->group(function () {
    Route::resource('jenisBansos', JenisBansosController::class);
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('sub_kriteria', SubKriteriaController::class);
});

// setting
Route::middleware('auth')->prefix('setting')->group(function () {
    Route::resource('alternatif_bansos', AlternatifBansosController::class);
    Route::resource('kriteria_bansos', KriteriaBansosController::class);
});

// perhitungan spk
Route::middleware('auth')->prefix('spk')->group(function () {
    Route::resource('perbandingan_kriteria', PerbandinganKriteriaController::class);
    Route::post('/prosess_sub_spk', [PerbandinganSubKriteriaController::class,'prosess_sub_spk'])->name('prosess_sub_spk');
    Route::post('/hasil_sub_spk', [PerbandinganSubKriteriaController::class,'hasil_sub_spk'])->name('hasil_pv_sub_spk');
    Route::get('/prosess_spk', [PerbandinganKriteriaController::class, 'prosess_spk'])->name('prosess_spk');
    Route::post('/hasil_spk', [PerbandinganKriteriaController::class, 'hasil_spk'])->name('hasil_pv_alternatif');
    Route::post('/hasil', [HasilController::class, 'index'])->name('hasil_spk');
    Route::post('/nilai_alternatif', [NilaiAlternatifController::class, 'index'])->name('nilai_alternatif');
});

// jenis bansos
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
});
