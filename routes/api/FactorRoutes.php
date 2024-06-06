<?php

use App\Http\Controllers\apiControllers\FactorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'factors', 'as' => 'factors.'], function () {
    Route::get('index/{id?}', [FactorController::class, 'index'])->name('index');
    Route::post('store', [FactorController::class, 'store'])->name('store');
    Route::put('update/{id}', [FactorController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [FactorController::class, 'destroy'])->name('destroy');
});
