<?php

use App\Http\Controllers\apiControllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('index/{id?}', [ProductController::class, 'index'])->name('index');
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
