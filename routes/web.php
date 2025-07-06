<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/content/rekap-biaya', function () {
    return view('partials.rekap-biaya');
})->name('biaya.create');

Route::post('/pengguna/tambah', [UserController::class, 'store'])->name('pengguna.store');

Route::get('/content/data-obat', function () {
    return view('partials.data-obat'); 
});

Route::get('/rekap', [RekapBiayaController::class, 'index'])->name('rekap.index');
