<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

//Products 
Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
//Category
Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
//AppConfig
Route::resource('/config', App\Http\Controllers\Admin\AppConfigController::class);