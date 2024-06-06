<?php

use App\Http\Controllers\apiControllers\MessageController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
    Route::get('index/{id?}', [MessageController::class, 'index'])->name('index');
    Route::post('store', [MessageController::class, 'store'])->name('store');
    Route::put('update/{id}', [MessageController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [MessageController::class, 'destroy'])->name('destroy');
});
