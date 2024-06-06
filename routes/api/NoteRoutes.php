<?php

use App\Http\Controllers\apiControllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('index/{id?}', [NoteController::class, 'index'])->name('index');
    Route::post('store', [NoteController::class, 'store'])->name('store');
    Route::put('update/{id}', [NoteController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [NoteController::class, 'destroy'])->name('destroy');
});
