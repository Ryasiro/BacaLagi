<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DescController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/produk', [AdminController::class, 'index'])->name('admin.produk');
    Route::post('/admin/produk/{id}/{status}', [AdminController::class, 'updateStatus'])->name('admin.produk.status');
});


//dahsboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


//test
Route::get('/produk', [DescController::class, 'index'])->name('desc');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');





require __DIR__.'/auth.php';