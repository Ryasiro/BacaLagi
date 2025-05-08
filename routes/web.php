<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DescController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // arahkan ke dashboard jika sudah login
    }
    return redirect()->route('login'); // arahkan ke login jika belum login
});

//admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/produk', [AdminController::class, 'index'])->name('admin.produk');
    Route::post('/admin/produk/{id}/{status}', [AdminController::class, 'updateStatus'])->name('admin.produk.status');
});
//route delete produk
Route::delete('/admin/produk/{id}/hapus', [AdminController::class, 'hapusProduk'])->name('admin.produk.hapus');
Route::get('/admin/produk/accepted', [AdminController::class, 'produkDiterima'])->name('admin.produk.diterima');



//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

//middleware autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route add produk
Route::middleware('auth')->group(function () {
    Route::get('/add', [AddProdukController::class, 'index'])->name('AddProductIndex');
    Route::post('/add', [AddProdukController::class, 'store'])->name('produk.store');
});

//notif
Route::get('/notifikasi', [NotificationController::class, 'index'])->name('user.notifications');


// routes/web.php
Route::get('/produk/{judul_buku}/{id}', [ProdukController::class, 'show'])->name('produk.detail');

//route search
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');






require __DIR__.'/auth.php';