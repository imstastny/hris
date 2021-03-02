<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/cuti')->group(function () {
        Route::get('/pengajuan', [CutiController::class, 'pengajuan'])->name('cuti.pengajuan');
        Route::get('/formulir', [CutiController::class, 'formulir'])->name('cuti.formulir');
    });

    Route::prefix('/izin')->group(function () {
        Route::get('/pengajuan', [IzinController::class, 'pengajuan'])->name('izin.pengajuan');
        Route::get('/formulir', [IzinController::class, 'formulir'])->name('izin.formulir');
    });
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
