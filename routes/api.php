<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Interfaces\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix'=>'auth'],function(){
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
});

Route::group(['prefix'=>'products'],function(){
Route::get('/',[ProductsController::class,'products']);

});
Route::group(['prefix'=>'cart','middleware'=>'jwtAuth'],function(){
   Route::post('/add',[CartController::class,'addToCart']);
   Route::get('/usercart',[CartController::class,'userCart']); 
   Route::post('/delete/{id}',[CartController::class,'deleteFromCart']);
   Route::post('/update/{id}',[CartController ::class,'updateCart']);
    });

   
  Route::post('/checkout',[OrderController::class,'checkOut']);