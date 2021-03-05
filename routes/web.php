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
        Route::get('/', [CutiController::class, 'index'])->name('cuti.index');
        Route::get('/admin', [CutiController::class, 'admin'])->name('cuti.admin');
        Route::get('/create', [CutiController::class, 'create'])->name('cuti.create');
        Route::post('/create', [CutiController::class, 'store'])->name('cuti.store');
        Route::delete('/{cuti:slug}/delete', [CutiController::class, 'destroy']);
        Route::get('/{cuti:slug}', [CutiController::class, 'show']);
        Route::get('/{cuti:slug}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
        Route::patch('/{cuti:slug}/edit', [CutiController::class, 'update'])->name('cuti.update');
    });

    Route::prefix('/izin')->group(function () {
        Route::get('/', [IzinController::class, 'index'])->name('izin.index');
        Route::get('/create', [IzinController::class, 'create'])->name('izin.create');
    });
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
