<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('home');
});
/* Admin */
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::get('/admin/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::post('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
Route::get('/admin/products/{product}/delete', [ProductController::class, 'destroy'])->name('admin.products.destroy');

Route::get('/admin/shops', [ShopController::class, 'index'])->name('admin.shops.index');
Route::get('/admin/shops/create', [ShopController::class, 'create'])->name('admin.shops.create');
Route::post('/admin/shops/store', [ShopController::class, 'store'])->name('admin.shops.store');
Route::get('/admin/shops/{shop}/edit', [ShopController::class, 'edit'])->name('admin.shops.edit');
Route::post('/admin/shops/{shop}', [ShopController::class, 'update'])->name('admin.shops.update');
Route::get('/admin/shops/{shop}/delete', [ShopController::class, 'destroy'])->name('admin.shops.destroy');
/* Fim */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
