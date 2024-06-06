<?php

use App\Http\Controllers\apiControllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
    Route::get('index/{id?}', [BrandController::class, 'index'])->name('index');
    Route::post('store', [BrandController::class, 'store'])->name('store');
    Route::put('update/{id}', [BrandController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
});
