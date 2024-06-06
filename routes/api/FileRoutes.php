<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiControllers\FileController;

Route::group(['prefix' => 'file', 'as' => 'file.'], function () {
    Route::post('download', [FileController::class, 'download'])->name('download');
    Route::post('upload/{model_type}/{model_id}', [FileController::class, 'upload'])->name('upload');
    Route::put('update/{id}', [FileController::class, 'update'])->name('update');
    Route::delete('destroy/{modelType}/{modelId}/{mediaId}', [FileController::class, 'destroy'])->name('destroy');
});
