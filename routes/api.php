<?php

use App\Http\Controllers\apiControllers\ArticleController;
use App\Http\Controllers\apiControllers\categoryController;
use App\Http\Controllers\apiControllers\OrderController;
use App\Http\Controllers\apiControllers\ProductController;
use App\Http\Controllers\apiControllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [UserController::class, 'login'])->name('login');
// Route::middleware('auth:sanctum')->group(function () {
Route::resource('user', UserController::class);
Route::resource('product', ProductController::class);
Route::resource('order', OrderController::class);
Route::resource('article', ArticleController::class);
Route::resource('category', categoryController::class);
// });
