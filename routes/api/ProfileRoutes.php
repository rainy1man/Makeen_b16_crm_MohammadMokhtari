<?php

use App\Http\Controllers\apiControllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
    Route::get('index/{id?}', [ProfileController::class, 'index'])->name('index');
    Route::post('store', [ProfileController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProfileController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProfileController::class, 'destroy'])->name('destroy');
});
