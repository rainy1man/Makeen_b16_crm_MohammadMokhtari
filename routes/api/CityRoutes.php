<?php

use App\Http\Controllers\apiControllers\CityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::get('index/{id?}', [CityController::class, 'index'])->name('index');
    Route::post('store', [CityController::class, 'store'])->name('store');
    Route::put('update/{id}', [CityController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [CityController::class, 'destroy'])->name('destroy');
});
