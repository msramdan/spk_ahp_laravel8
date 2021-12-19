<?php

use App\Http\Controllers\AlternatifBansosController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBansosController;
use App\Http\Controllers\KriteriaBansosController;
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

// jenis bansos
Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
});
