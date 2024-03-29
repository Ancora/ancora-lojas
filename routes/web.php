<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ElementController;
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

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    //Route::prefix('admin')->name('admin.')->group(function () {
    /* Categories */
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/{category}/delete', [CategoryController::class, 'destroy'])->name('destroy');
    });

    /* Shops */
    Route::prefix('shops')->name('shops.')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/create', [ShopController::class, 'create'])->name('create');
        Route::post('/store', [ShopController::class, 'store'])->name('store');
        Route::get('/{shop}/edit', [ShopController::class, 'edit'])->name('edit');
        Route::post('/update/{shop}', [ShopController::class, 'update'])->name('update');
        Route::get('/{shop}/delete', [ShopController::class, 'destroy'])->name('destroy');
    });

    /* Colors */
    Route::prefix('colors')->name('colors.')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::get('/create', [ColorController::class, 'create'])->name('create');
        Route::post('/store', [ColorController::class, 'store'])->name('store');
        Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('edit');
        Route::post('/update/{color}', [ColorController::class, 'update'])->name('update');
        Route::get('{color}/delete', [ColorController::class, 'destroy'])->name('destroy');
    });

    /* Elements */
    Route::prefix('elements')->name('elements.')->group(function () {
        Route::get('/', [ElementController::class, 'index'])->name('index');
        Route::get('/create', [ElementController::class, 'create'])->name('create');
        Route::post('/store', [ElementController::class, 'store'])->name('store');
        Route::get('/{element}/edit', [ElementController::class, 'edit'])->name('edit');
        Route::post('/update/{element}', [ElementController::class, 'update'])->name('update');
        Route::get('{element}/delete', [ElementController::class, 'destroy'])->name('destroy');
    });

    /* Products */
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::get('/{product}/delete', [ProductController::class, 'destroy'])->name('destroy');
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
