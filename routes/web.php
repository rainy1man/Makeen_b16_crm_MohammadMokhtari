<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\categoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//User Routes ..................................................

Route::resource('users', userController::class)->except('show');

Route::get('/users/index', [userController::class, 'index']);
Route::get('/users/create', [userController::class, 'create']);
Route::get('/users/edit/{id}', [userController::class, 'edit']);
Route::post('/users/create', [userController::class, 'store']);
Route::post('/users/edit/{id}', [userController::class, 'update']);
Route::delete('users/delete/{id}', [userController::class, 'destroy']);

//product Routes ...............................................

Route::get('/products/index', [productController::class, 'index']);
Route::get('/products/create', [productController::class, 'create']);
Route::get('/products/edit/{id}', [productController::class, 'edit']);
Route::post('/products/create', [productController::class, 'store']);
Route::post('/products/edit/{id}', [productController::class, 'update']);
Route::delete('products/delete/{id}', [productController::class, 'destroy']);

//order Routes ..............................................

Route::get('/orders/index', [orderController::class, 'index']);
Route::get('/orders/create', [orderController::class, 'create']);
Route::get('/orders/edit/{id}', [orderController::class, 'edit']);
Route::post('/orders/create', [orderController::class, 'store']);
Route::post('/orders/edit/{id}', [orderController::class, 'update']);
Route::delete('orders/delete/{id}', [orderController::class, 'destroy']);

//article Routes ...............................................

Route::get('/articles/index', [articleController::class, 'index']);
Route::get('/articles/create', [articleController::class, 'create']);
Route::get('/articles/edit/{id}', [articleController::class, 'edit']);
Route::post('/articles/create', [articleController::class, 'store']);
Route::post('/articles/edit/{id}', [articleController::class, 'update']);
Route::delete('articles/delete/{id}', [articleController::class, 'destroy']);

//category Routes ...............................................
//category GET Routes
Route::get('/categories/index', function () {
    $categories = DB::table('categories')->get();
    return view('categories.index', ["categories" => $categories]);
});

Route::get('/categories/create', function () {
    return view('categories.create');
});

Route::get('/categories/edit/{id}', function ($id) {
    $category = DB::table('categories')->where('id', $id)->first();
    return view('categories.edit', ["category" => $category]);
});

//category POST Routes
Route::post('/categories/create', function (Request $request) {

    DB::table('categories')->insert([
        "categoryName" => $request->categoryName,
        "description" => $request->description,
    ]);
    return redirect('/categories/index');
});

Route::post('/categories/edit/{id}', function (Request $request, $id) {

    DB::table('categories')->where('id', $id)->update([
        "categoryName" => $request->categoryName,
        "description" => $request->description,
    ]);
    return redirect('/categories/index');
});

//category Delete Route
Route::delete('categories/delete/{id}', function ($id) {
    DB::table('categories')->where('id', $id)->delete();
    return redirect('/categories/index');
});
