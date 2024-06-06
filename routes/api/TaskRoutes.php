<?php

use App\Http\Controllers\apiControllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
    Route::get('index/{id?}', [TaskController::class, 'index'])->name('index');
    Route::post('store', [TaskController::class, 'store'])->name('store');
    Route::put('update/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
});
