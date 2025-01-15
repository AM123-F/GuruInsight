<?php

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
