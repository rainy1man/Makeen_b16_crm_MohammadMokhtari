<?php

use App\Http\Controllers\apiControllers\BrandController;
use App\Http\Controllers\apiControllers\CategoryController;
use App\Http\Controllers\apiControllers\CityController;
use App\Http\Controllers\apiControllers\FactorController;
use App\Http\Controllers\apiControllers\LabelController;
use App\Http\Controllers\apiControllers\MessageController;
use App\Http\Controllers\apiControllers\OrderController;
use App\Http\Controllers\apiControllers\ProductController;
use App\Http\Controllers\apiControllers\ProfileController;
use App\Http\Controllers\apiControllers\ProvinceController;
use App\Http\Controllers\apiControllers\TaskController;
use App\Http\Controllers\apiControllers\TeamController;
use App\Http\Controllers\apiControllers\TicketController;
use App\Http\Controllers\apiControllers\UserController;
use App\Http\Controllers\apiControllers\WarrantyController;
use App\Http\Controllers\apiControllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {

});

// Route::resources([
//     'user' => UserController::class,
//     'product' => UserController::class,
//     'order' => UserController::class,
//     'task' => UserController::class,
//     'category' => UserController::class,
// ]);

// Teams Routes
Route::group(['prefix' => 'teams', 'as' => 'teams.'], function () {
    Route::get('index/{id?}', [TeamController::class, 'index'])->name('index');
    Route::post('store', [TeamController::class, 'store'])->name('store');
    Route::put('update/{id}', [TeamController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
});

// Users Routes
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('index/{id?}', [UserController::class, 'index'])->name('index');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::put('update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Provinces Routes
Route::group(['prefix' => 'provinces', 'as' => 'provinces.'], function () {
    Route::get('index/{id?}', [ProvinceController::class, 'index'])->name('index');
    Route::post('store', [ProvinceController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProvinceController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProvinceController::class, 'destroy'])->name('destroy');
});

// Cities Routes
Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::get('index/{id?}', [CityController::class, 'index'])->name('index');
    Route::post('store', [CityController::class, 'store'])->name('store');
    Route::put('update/{id}', [CityController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [CityController::class, 'destroy'])->name('destroy');
});

// Profiles Routes
Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
    Route::get('index/{id?}', [ProfileController::class, 'index'])->name('index');
    Route::post('store', [ProfileController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProfileController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProfileController::class, 'destroy'])->name('destroy');
});

// Notes Routes
Route::group(['prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('index/{id?}', [NoteController::class, 'index'])->name('index');
    Route::post('store', [NoteController::class, 'store'])->name('store');
    Route::put('update/{id}', [NoteController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [NoteController::class, 'destroy'])->name('destroy');
});

// Orders Routes
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('index/{id?}', [OrderController::class, 'index'])->name('index');
    Route::post('store', [OrderController::class, 'store'])->name('store');
    Route::put('update/{id}', [OrderController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
});

// Brands Routes
Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
    Route::get('index/{id?}', [BrandController::class, 'index'])->name('index');
    Route::post('store', [BrandController::class, 'store'])->name('store');
    Route::put('update/{id}', [BrandController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
});

// Categories Routes
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('index/{id?}', [CategoryController::class, 'index'])->name('index');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::put('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

// Products Routes
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('index/{id?}', [ProductController::class, 'index'])->name('index');
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

// Warranties Routes
Route::group(['prefix' => 'warranties', 'as' => 'warranties.'], function () {
    Route::get('index/{id?}', [WarrantyController::class, 'index'])->name('index');
    Route::post('store', [WarrantyController::class, 'store'])->name('store');
    Route::put('update/{id}', [WarrantyController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [WarrantyController::class, 'destroy'])->name('destroy');
});

// Factors Routes
Route::group(['prefix' => 'factors', 'as' => 'factors.'], function () {
    Route::get('index/{id?}', [FactorController::class, 'index'])->name('index');
    Route::post('store', [FactorController::class, 'store'])->name('store');
    Route::put('update/{id}', [FactorController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [FactorController::class, 'destroy'])->name('destroy');
});

// Tasks Routes
Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
    Route::get('index/{id?}', [TaskController::class, 'index'])->name('index');
    Route::post('store', [TaskController::class, 'store'])->name('store');
    Route::put('update/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
});

// Labels Routes
Route::group(['prefix' => 'labels', 'as' => 'labels.'], function () {
    Route::get('index/{id?}', [LabelController::class, 'index'])->name('index');
    Route::post('store', [LabelController::class, 'store'])->name('store');
    Route::put('update/{id}', [LabelController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [LabelController::class, 'destroy'])->name('destroy');
    Route::post('add/{id}', [LabelController::class, 'add'])->name('add')->name('add');
    Route::delete('drop/{id}', [LabelController::class, 'drop'])->name('drop')->name('drop');
});

// Tickets Routes
Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function () {
    Route::get('index/{id?}', [TicketController::class, 'index'])->name('index');
    Route::post('store', [TicketController::class, 'store'])->name('store');
    Route::put('update/{id}', [TicketController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TicketController::class, 'destroy'])->name('destroy');
});

// Messages Routes
Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
    Route::get('index/{id?}', [MessageController::class, 'index'])->name('index');
    Route::post('store', [MessageController::class, 'store'])->name('store');
    Route::put('update/{id}', [MessageController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [MessageController::class, 'destroy'])->name('destroy');
});
