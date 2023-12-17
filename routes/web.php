<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ALTERNATIFController;
use App\Http\Controllers\KRITERIAController;
use App\Http\Controllers\NILAIController;
use App\Http\Controllers\HASILController;
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
    return view('welcome');
});

Route::get('/alternatif',[ALTERNATIFController::class,"index"]);
Route::get('/alternatif/create', [ALTERNATIFController::class, 'create'])->name('alternatif.create');
Route::get('/alternatif/edit/{id}', [ALTERNATIFController::class, 'edit'])->name('alternatif.edit');
Route::put('/alternatif/{id}', [ALTERNATIFController::class, 'update'])->name('alternatif.update');
Route::delete('/alternatif/{id}', [ALTERNATIFController::class, 'destroy'])->name('alternatif.destroy');
Route::post('/alternatif', [ALTERNATIFController::class, 'store'])->name('alternatif.store');
Route::get('/alternatif', [ALTERNATIFController::class, 'index'])->name('alternatif.index');

Route::get('/kriteria',[KRITERIAController::class,"index"]);
Route::get('/kriteria/create', [KRITERIAController::class, 'create'])->name('kriteria.create');
Route::get('/kriteria/edit/{id}', [KRITERIAController::class, 'edit'])->name('kriteria.edit');
Route::put('/kriteria/{id}', [KRITERIAController::class, 'update'])->name('kriteria.update');
Route::delete('/kriteria/{id}', [KRITERIAController::class, 'destroy'])->name('kriteria.destroy');
Route::post('/kriteria', [KRITERIAController::class, 'store'])->name('kriteria.store');
Route::get('/kriteria', [KRITERIAController::class, 'index'])->name('kriteria.index');

Route::get('/nilai',[NILAIController::class,"index"]);
Route::get('/nilai/create', [NILAIController::class, 'create'])->name('nilai.create');
Route::get('/nilai/edit/{id}', [NILAIController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NILAIController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{id}', [NILAIController::class, 'destroy'])->name('nilai.destroy');
Route::post('/nilai', [NILAIController::class, 'store'])->name('nilai.store');
Route::get('/nilai', [NILAIController::class, 'index'])->name('nilai.index');



Route::get('/hasil', [HASILController::class, 'calculateMooraValues']);



Route::get('/dashboard', function () {
    return view('dashboard');
});
