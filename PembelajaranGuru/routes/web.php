<?php

use App\Http\Controllers\BlangkoController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JenisBlangkoController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\WakasekController;
use App\Http\Controllers\WakasekUploadController;
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

Route::get('/landing', function () {
    return view('welcome');
});
Route::middleware(['guest'])->group(function(){

Route::get('/' , [SesiController::class, 'index'])->name('login');
Route::post('/' , [SesiController::class, 'login']);
});
 
Route::middleware(['auth'])->group(function(){
    Route::get('/kepsek/dashboard', [KepsekController::class, 'kepsek'])->name('kepsek.dashboard')->middleware(('userAkses:kepsek'));
    Route::get('/wakasek/dashboard', [WakasekController::class, 'dashboard'])->name('Wakasek.dashboard')->middleware(('userAkses:wakasek'));
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard')->middleware(('userAkses:guru'));
    Route::get('/logout', [SesiController::class, 'logout']);
});

// Rute khusus untuk Wakasek
Route::middleware(['auth', 'role:wakasek'])->prefix('wakasek')->name('wakasek.')->group(function () {
    Route::get('/dashboard-wakasek', [WakasekController::class, 'dashboard'])->name('dashboard');

    Route::get('/wakasek/uploads', [WakasekUploadController::class, 'index'])->name('wakasek.uploads');


    Route::get('/blangkos/index', [BlangkoController::class, 'index'])->name('wakasek.blangkos.index');
    Route::get('/blangkos/create', [BlangkoController::class, 'create'])->name('wakasek.blangkos.create');
    Route::post('/blangkos/store', [BlangkoController::class, 'store'])->name('wakasek.blangkos.store');
    Route::get('/blangkos/{blangko}/edit', [BlangkoController::class, 'edit'])->name('wakasek.blangkos.edit');
    Route::put('/blangkos/{blangko}/update', [BlangkoController::class, 'update'])->name('wakasek.blangkos.update');
    Route::delete('/blangkos/{blangko}/destroy', [BlangkoController::class, 'destroy'])->name('wakasek.blangkos.destroy');
    // Data Guru
    Route::get('/data-guru', [DataGuruController::class, 'index'])->name('dataGuru.index');
    Route::get('/data-guru/create', [DataGuruController::class, 'create'])->name('dataGuru.create');
    Route::post('/data-guru', [DataGuruController::class, 'store'])->name('dataGuru.store');
    Route::get('/data-guru/{guru}/edit', [DataGuruController::class, 'edit'])->name('dataGuru.edit');
    Route::put('/data-guru/{guru}', [DataGuruController::class, 'update'])->name('dataGuru.update');
    Route::delete('/data-guru/{guru}', [DataGuruController::class, 'destroy'])->name('dataGuru.destroy');
    Route::post('/data-guru/import', [DataGuruController::class, 'import'])->name('dataGuruImport');

    
});



Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/blangko', [GuruController::class, 'blangko'])->name('guru.blangko');
    Route::get('guru/guru/upload-tugas', [GuruController::class, 'showUploadForm'])->name('guru.guru.upload.tugas.form');
    Route::post('guru/guru/upload-tugas-store', [GuruController::class, 'storeTugas'])->name('guru.guru.upload.store');
    Route::delete('/guru/guru/upload/{id}', [GuruController::class, 'destroy'])->name('guru.guru.upload.destroy');

    
    
});



Route::middleware(['auth', 'role:wakasek'])->prefix('wakasek')->name('wakasek.')->group(function () {
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
    Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
    Route::get('/wakasek/mapel/{id}', [MapelController::class, 'show'])->name('wakasek.mapel.show');

});
Route::prefix('wakasek')->group(function () {
    Route::resource('jenis_blangko', JenisBlangkoController::class);
});



