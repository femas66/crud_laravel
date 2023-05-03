<?php
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VaksinController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');
Route::group(['middleware' => 'cekLogin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/tambahwarga', [DashboardController::class, 'tambahwarga'])->name('tambahwarga');
    Route::post('/tambahwarga', [DashboardController::class, 'actiontambahwarga'])->name('actiontambahwarga');
    Route::get('/editwarga/{id}', [DashboardController::class, 'editwarga']);
    Route::post('/editwarga/store', [DashboardController::class, 'actioneditwarga'])->name('editwarga');
    Route::get('/hapuswarga/id/{id}', [DashboardController::class, 'hapuswarga']);
    // Halaman pekerjaan
    Route::prefix('pekerjaan')->group(function () {
        Route::get('/', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
        Route::get('/create', [PekerjaanController::class, 'create'])->name('pekerjaan.create');
        Route::post('/', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
        Route::get('/{id}/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
        Route::put('/{id}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
        Route::get('/{id}', [PekerjaanController::class, 'delete'])->name('pekerjaan.delete');
    });
    //halaman hobi
    Route::prefix('hobi')->group(function () {
        Route::get('/', [HobiController::class, 'index'])->name('hobi.index');
        Route::get('/create', [HobiController::class, 'create'])->name('hobi.create');
        Route::post('/', [HobiController::class, 'store'])->name('hobi.store');
        Route::get('/{id}/edit', [HobiController::class, 'edit'])->name('hobi.edit');
        Route::put('/{id}', [HobiController::class, 'update'])->name('hobi.update');
        Route::get('/{id}', [HobiController::class, 'delete'])->name('hobi.delete');
    });

    //halaman vaksin
    Route::prefix('vaksin')->group(function () {
        Route::get('/', [VaksinController::class, 'index'])->name('vaksin.index');
        Route::get('/create', [VaksinController::class, 'create'])->name('vaksin.create');
        Route::post('/', [VaksinController::class, 'store'])->name('vaksin.store');
        Route::get('/{id}/edit', [VaksinController::class, 'edit'])->name('vaksin.edit');
        Route::put('/{id}', [VaksinController::class, 'update'])->name('vaksin.update');
        Route::get('/{id}', [VaksinController::class, 'delete'])->name('vaksin.delete');
    });
    //halaman agama
    Route::prefix('agama')->group(function () {
        Route::get('/', [AgamaController::class, 'index'])->name('agama.index');
        Route::get('/create', [AgamaController::class, 'create'])->name('agama.create');
        Route::post('/', [AgamaController::class, 'store'])->name('agama.store');
        Route::get('/{id}/edit', [AgamaController::class, 'edit'])->name('agama.edit');
        Route::put('/{id}', [AgamaController::class, 'update'])->name('agama.update');
        Route::get('/{id}', [AgamaController::class, 'delete'])->name('agama.delete');
    });
});
