<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanController;
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
    Route::get('/hapuswarga/id/{id}', [DashboardController::class, 'hapuswarga']);

    // Halaman pekerjaan
    Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
    Route::get('/pekerjaan/create', [PekerjaanController::class, 'create'])->name('pekerjaan.create');
    Route::post('/pekerjaan', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
    Route::get('/pekerjaan/{id}/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
    Route::put('/pekerjaan/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
    Route::delete('/pekerjaan/{id}', [PekerjaanController::class, 'delete'])->name('pekerjaan.delete');

    //halaman hobi
    Route::get('/hobi', [HobiController::class, 'index'])->name('hobi.index');
    Route::get('/hobi/create', [HobiController::class, 'create'])->name('hobi.create');
    Route::post('/hobi', [HobiController::class, 'store'])->name('hobi.store');
    Route::get('/hobi/{id}/edit', [HobiController::class, 'edit'])->name('hobi.edit');
    Route::put('/hobi/{id}', [HobiController::class, 'update'])->name('hobi.update');
    Route::delete('/hobi/{id}', [HobiController::class, 'delete'])->name('hobi.delete');
});
