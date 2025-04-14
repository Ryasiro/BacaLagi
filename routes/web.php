<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DescController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/produk', [DescController::class, 'index'])->name('desc');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');

Route::get('/add', [AddProdukController::class, 'index'])->name('AddProduct');
