<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Selamat datang";
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => 'cekLogin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/tambahwarga', [DashboardController::class, 'tambahwarga'])->name('tambahwarga');
    Route::post('/tambahwarga', [DashboardController::class, 'actiontambahwarga'])->name('actiontambahwarga');
    Route::get('/editwarga/{id}', [DashboardController::class, 'editwarga']);
    Route::post('/editwarga/store', [DashboardController::class, 'actioneditwarga'])->name('editwarga');
});
