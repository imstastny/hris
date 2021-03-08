<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\ProfilController;
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
    Route::get('/rekap/cuti', [DashboardController::class, 'cuti'])->name('rekap.cuti');
    Route::get('/rekap/izin', [DashboardController::class, 'izin'])->name('rekap.izin');

    Route::prefix('/profil')->group(function () {
        Route::get('/', [ProfilController::class, 'show'])->name('profil.show');
    });

    Route::prefix('/anggota')->middleware('can:isAdmin')->group(function () {
        Route::get('/', [KelolaController::class, 'index'])->name('kelola.index');
        Route::get('/daftar', [KelolaController::class, 'create'])->name('kelola.daftar');
        Route::post('/daftar', [KelolaController::class, 'store'])->name('kelola.store');
        Route::get('/{user:nik}/edit', [KelolaController::class, 'edit']);
        Route::patch('/{user:nik}/edit', [KelolaController::class, 'update']);
        Route::delete('/{user:nik}/delete', [KelolaController::class, 'destroy']);
    });

    Route::prefix('/cuti')->group(function () {
        Route::get('/', [CutiController::class, 'index'])->name('cuti.index');
        Route::get('/admin', [CutiController::class, 'admin'])->middleware('can:edit')->name('cuti.admin');
        Route::get('/create', [CutiController::class, 'create'])->name('cuti.create');
        Route::post('/create', [CutiController::class, 'store'])->name('cuti.store');
        Route::get('/{cuti:slug}', [CutiController::class, 'show']);
        Route::get('/{cuti:slug}/edit', [CutiController::class, 'edit'])->middleware('can:edit')->name('cuti.edit');
        Route::patch('/{cuti:slug}/edit', [CutiController::class, 'update'])->middleware('can:update')->name('cuti.update');
        Route::delete('/{cuti:slug}/delete', [CutiController::class, 'destroy'])->middleware('can:delete');
    });

    Route::prefix('/izin')->group(function () {
        Route::get('/', [IzinController::class, 'index'])->name('izin.index');
        Route::get('/admin', [IzinController::class, 'admin'])->middleware('can:edit')->name('izin.admin');
        Route::get('/create', [IzinController::class, 'create'])->name('izin.create');
        Route::post('/create', [IzinController::class, 'store'])->name('izin.store');
        Route::get('/{izin:slug}', [IzinController::class, 'show']);
        Route::get('/{izin:slug}/edit', [IzinController::class, 'edit'])->middleware('can:edit')->name('izin.edit');
        Route::patch('/{izin:slug}/edit', [IzinController::class, 'update'])->middleware('can:update')->name('izin.update');
        Route::delete('/{izin:slug}/delete', [IzinController::class, 'destroy'])->middleware('can:delete');
    });
});


Auth::routes([
    'register' => false,
    'reset' => false
]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
