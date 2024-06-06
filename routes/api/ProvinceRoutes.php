<?php

use App\Http\Controllers\apiControllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'provinces', 'as' => 'provinces.'], function () {
    Route::get('index/{id?}', [ProvinceController::class, 'index'])->name('index');
    Route::post('store', [ProvinceController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProvinceController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProvinceController::class, 'destroy'])->name('destroy');
});
