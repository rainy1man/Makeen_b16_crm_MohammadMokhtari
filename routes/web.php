<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//User Routes ..................................................

// Route::resource('users', UserController::class)->except('show');
// Route::prefix('users')->group(function () {
// Route::get('index', [UserController::class, 'index'])->name('users.index');
// Route::get('create', [UserController::class, 'create'])->name('users.create');
// Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::post('create', [UserController::class, 'store'])->name('users.store');
// Route::post('edit/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
// });

// //product Routes ...............................................
// Route::prefix('products')->group(function () {
// Route::get('index', [ProductController::class, 'index'])->name('products.index');
// Route::get('create', [ProductController::class, 'create'])->name('products.create');
// Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
// Route::post('create', [ProductController::class, 'store'])->name('products.store');
// Route::post('edit/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
// });

// //order Routes ..............................................
// Route::prefix('orders')->group(function () {
// Route::get('index', [OrderController::class, 'index'])->name('orders.index');
// Route::get('create', [OrderController::class, 'create'])->name('orders.create');
// Route::get('edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
// Route::post('create', [OrderController::class, 'store'])->name('orders.store');
// Route::post('edit/{id}', [OrderController::class, 'update'])->name('orders.update');
// Route::delete('delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
// });

// //article Routes ...............................................
// Route::prefix('articles')->group(function () {
// Route::get('index', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('create', [ArticleController::class, 'create'])->name('articles.create');
// Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
// Route::post('create', [ArticleController::class, 'store'])->name('articles.store');
// Route::post('edit/{id}', [ArticleController::class, 'update'])->name('articles.update');
// Route::delete('delete/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
// });

// //category Routes ...............................................
// Route::prefix('categories')->group(function () {
// Route::get('index', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
// Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::post('create', [CategoryController::class, 'store'])->name('categories.store');
// Route::post('edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
// });
