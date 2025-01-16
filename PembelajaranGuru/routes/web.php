<?php

use App\Http\Controllers\BlangkoController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\WakasekController;
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
    return view('welcome');
});
Route::middleware(['guest'])->group(function(){

Route::get('/login' , [SesiController::class, 'index'])->name('login');
Route::post('/login' , [SesiController::class, 'login']);
});
 
Route::middleware(['auth'])->group(function(){
    Route::get('/kepsek/dashboard', [KepsekController::class, 'kepsek'])->name('kepsek.dashboard')->middleware(('userAkses:kepsek'));
    Route::get('/wakasek/dashboard', [WakasekController::class, 'dashboard'])->name('Wakasek.dashboard')->middleware(('userAkses:wakasek'));
    Route::get('/kasir', [KepsekController::class, 'wakasek'])->name('wakasek.dashboard')->middleware(('userAkses:wakasek'));
    Route::get('/owner', [KepsekController::class, 'guru'])->name('guru.dashboard')->middleware(('userAkses:guru'));
    Route::get('/logout', [SesiController::class, 'logout']);
});

// Rute khusus untuk Wakasek
Route::middleware(['auth', 'role:wakasek'])->prefix('wakasek')->name('wakasek.')->group(function () {
    // Halaman daftar blangko
    Route::get('blangkos', [BlangkoController::class, 'index'])->name('blangkos.index');

    // Halaman form upload blangko
    Route::get('blangkos/create', [BlangkoController::class, 'create'])->name('blangkos.create');

    // Proses penyimpanan blangko
    Route::post('blangkos/store', [BlangkoController::class, 'store'])->name('blangkos.store');

    // Jika ingin menambahkan edit, update, atau delete:
    // Halaman form edit blangko
    Route::get('blangkos/{id}/edit', [BlangkoController::class, 'edit'])->name('blangkos.edit');

    // Proses update blangko
    Route::put('blangkos/{id}/update', [BlangkoController::class, 'update'])->name('blangkos.update');

    // Proses hapus blangko
    Route::delete('blangkos/{id}/destroy', [BlangkoController::class, 'destroy'])->name('blangkos.destroy');
});

// Grup route khusus untuk Wakasek
Route::prefix('wakasek')->name('wakasek.')->middleware('auth')->group(function () {
    Route::get('/data-guru', [DataGuruController::class, 'index'])->name('dataGuru.index'); // Menampilkan daftar guru
    Route::get('/data-guru/create', [DataGuruController::class, 'create'])->name('dataGuru.create'); // Form tambah guru
    Route::post('/data-guru', [DataGuruController::class, 'store'])->name('dataGuru.store'); // Simpan data guru
    Route::get('/data-guru/{guru}/edit', [DataGuruController::class, 'edit'])->name('dataGuru.edit'); // Form edit guru
    Route::put('/data-guru/{guru}', [DataGuruController::class, 'update'])->name('dataGuru.update'); // Update data guru
    Route::delete('/data-guru/{guru}', [DataGuruController::class, 'destroy'])->name('dataGuru.destroy'); // Hapus data guru
        Route::get('/data-guru/import', [DataGuruController::class, 'import'])->name('dataGuru.import'); // Halaman form import
        Route::post('/data-guru/import', [DataGuruController::class, 'storeImport'])->name('dataGuru.storeImport'); // Proses upload file
});





