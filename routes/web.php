
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AnalisisController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

Route::get('/barang/{id}', [BarangController::class, 'detail'])->name('barang.detail');

Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis.index');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/kategori/{nama}', function ($nama) {
    return 'Kategori barang: ' . ucfirst($nama);
})->name('kategori');

Route::get('/informasi/{judul}', function ($judul) {
    return 'Informasi: ' . ucfirst($judul);
})->name('informasi');
