<?php

use App\Http\Controllers\apiControllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function () {
    Route::get('index/{id?}', [TicketController::class, 'index'])->name('index');
    Route::post('store', [TicketController::class, 'store'])->name('store');
    Route::put('update/{id}', [TicketController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TicketController::class, 'destroy'])->name('destroy');
});
