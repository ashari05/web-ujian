<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PesananPublicController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PenilaianController as AdminPenilaianController;
use App\Http\Controllers\Admin\KategoriController;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', fn()=>view('public.home'))->name('dashboard');

Route::get('/produk', [ProductController::class,'publicIndex'])->name('produk');
Route::get('/produk/{id}', [ProductController::class,'show'])->name('produk.detail');

Route::get('/testimoni', [PenilaianController::class,'publicIndex'])->name('testimoni');
Route::get('/testimoni-create', [PenilaianController::class,'create'])->name('testimoni.create');
Route::post('/testimoni', [PenilaianController::class,'store'])->name('testimoni.store');

Route::get('/kontak', fn()=>view('public.kontak'))->name('kontak');


/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

Route::get('/dashboard', [HomeController::class,'index'])->name('user.dashboard');

Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');

Route::get(
'/pesan/{id}',
[PesananPublicController::class,'create']
)->name('pesanan.create');

Route::get(
'/pesanan',
[PesananPublicController::class,'index']
)->name('pesanan.index');

Route::post(
'/pesan',
[PesananPublicController::class,'store']
)->name('pesanan.store');
});

Route::get(
'/pesanan/{id}/edit',
[PesananPublicController::class,'edit']
)->name('pesanan.edit');


Route::post(
'/pesanan/{id}/update',
[PesananPublicController::class,'update']
)->name('pesanan.update');


Route::delete(
'/pesanan/{id}',
[PesananPublicController::class,'destroy']
)->name('pesanan.destroy');

Route::get('/pesan',
[PesananPublicController::class,'formUmum'])
->name('pesanan.form');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])
->prefix('admin')
->name('admin.')
->group(function () {


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', [AdminProductController::class,'index'])->name('products.index');
Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| PRODUK
|--------------------------------------------------------------------------
*/

Route::get('/products', [AdminProductController::class,'index'])->name('products.index');
Route::get('/products/create', [AdminProductController::class,'create'])->name('products.create');
Route::post('/products', [AdminProductController::class,'store'])->name('products.store');

Route::get('/products/{id}/edit', [AdminProductController::class,'edit'])->name('products.edit');
Route::post('/products/{id}', [AdminProductController::class,'update'])->name('products.update');
Route::delete('/products/{id}', [AdminProductController::class,'destroy'])->name('products.destroy');


/*
|--------------------------------------------------------------------------
| PENILAIAN
|--------------------------------------------------------------------------
*/

Route::get('/penilaian', [AdminPenilaianController::class,'index'])->name('penilaian.index');

Route::post('/penilaian/{id}/status',
[AdminPenilaianController::class,'updateStatus']
)->name('penilaian.status');

Route::delete('/penilaian/{id}',
[AdminPenilaianController::class,'destroy']
)->name('penilaian.destroy');


/*
|--------------------------------------------------------------------------
| KATEGORI
|--------------------------------------------------------------------------
*/

Route::get('/kategori', [KategoriController::class,'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class,'store'])->name('kategori.store');

Route::get('/kategori/{id}/edit', [KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class,'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class,'destroy'])->name('kategori.destroy');

Route::get('/pesanan',
[PesananController::class,'index'])
->name('pesanan.index');

Route::get('/pesanan/create',
[PesananController::class,'create'])
->name('pesanan.create');

Route::post('/pesanan',
[PesananController::class,'store'])
->name('pesanan.store');

Route::get('/pesanan/{id}/edit',
[PesananController::class,'edit'])
->name('pesanan.edit');

Route::post('/pesanan/{id}',
[PesananController::class,'update'])
->name('pesanan.update');

Route::delete('/pesanan/{id}',
[PesananController::class,'destroy'])
->name('pesanan.destroy');

});




require __DIR__.'/auth.php';