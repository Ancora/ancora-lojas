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

Route::prefix('admin')->namespace('Admin')->group(function () {
    /* Categories */
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    /* Products */
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/{product}/delete', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    /* Shops */
    Route::prefix('shops')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('admin.shops.index');
        Route::get('/create', [ShopController::class, 'create'])->name('admin.shops.create');
        Route::post('/store', [ShopController::class, 'store'])->name('admin.shops.store');
        Route::get('/{shop}/edit', [ShopController::class, 'edit'])->name('admin.shops.edit');
        Route::post('/{shop}', [ShopController::class, 'update'])->name('admin.shops.update');
        Route::get('/{shop}/delete', [ShopController::class, 'destroy'])->name('admin.shops.destroy');
    });
});

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
