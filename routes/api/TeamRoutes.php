<?php

use App\Http\Controllers\apiControllers\TeamController;
use Illuminate\Support\Facades\Route;


    Route::group(['prefix' => 'teams', 'as' => 'teams.'], function () {
        Route::get('index/{id?}', [TeamController::class, 'index'])->name('index');
        Route::post('store', [TeamController::class, 'store'])->name('store');
        Route::put('update/{id}', [TeamController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
    });
