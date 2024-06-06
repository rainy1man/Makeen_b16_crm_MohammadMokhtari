<?php

use App\Http\Controllers\apiControllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'labels', 'as' => 'labels.'], function () {
    Route::get('index/{id?}', [LabelController::class, 'index'])->name('index');
    Route::post('store', [LabelController::class, 'store'])->name('store');
    Route::put('update/{id}', [LabelController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [LabelController::class, 'destroy'])->name('destroy');
    Route::post('add/{id}', [LabelController::class, 'add'])->name('add')->name('add');
    Route::delete('drop/{id}', [LabelController::class, 'drop'])->name('drop')->name('drop');
});
