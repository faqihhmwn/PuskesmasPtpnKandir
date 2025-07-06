<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekapBiayaController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('components.login');
});

Route::get('/content/home', function () {
    return view('partials.home');
});

Route::get('/content/data-pengguna', function () {
    return view('partials.data-pengguna');
});

Route::get('/content/data-pasien', function (): Factory|View {
    return view('partials.data-pasien');
});

Route::get('/content/contact', function () {
    return view('partials.contact');
});

Route::post('/pengguna/tambah', [UserController::class, 'store'])->name('pengguna.store');

Route::get('/content/data-obat', function () {
    return view('partials.data-obat'); 
});

use App\Http\Controllers\RekapBiayaController;

Route::get('/content/rekap-biaya', [RekapBiayaController::class, 'index'])->name('rekap-biaya.index');
Route::post('/content/rekap-biaya', [RekapBiayaController::class, 'store'])->name('rekap-biaya.store');
Route::get('/content/rekap-biaya/export', [RekapBiayaController::class, 'export'])->name('rekap-biaya.export');

