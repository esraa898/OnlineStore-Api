<?php

use App\Http\Controllers\Admin\ProductController;
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
    return view('welcome');
});

Route::get('/products/upload',[ProductController::class,'Upload']);
Route::get('/products',[ProductController::class,'index'])->name('products');
Route::post('/products/upload/store',[ProductController::class,'uploadStore'])->name('upload.products');
Route::post('/productsDetail/upload/store',[ProductController::class,'uploadStoreDetail'])->name('upload.products.details');