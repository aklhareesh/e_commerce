<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('login', [AuthController::class,'login']);
Route::post('/user-registration',[AuthController::class,'userRegistration']);

Route::middleware('auth.api')->group(function () {

    Route::get('products/{id}', [ProductController::class,'index']);
    Route::get('products', [ProductController::class,'productList']);
    Route::post('products', [ProductController::class,'store']);
    Route::put('/products/{id}', [ProductController::class,'update']);
    Route::delete('products/{id}', [ProductController::class,'destroy']);

    Route::post('orders', [OrderController::class,'placeOrder']);
    Route::get('orders/{id}', [OrderController::class,'viewOrderHistory']);
    Route::get('orders', [OrderController::class,'orderList']);
    Route::put('orders/{id}', [OrderController::class,'update']);

    Route::get('/users', [UserController::class,'index']);
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::put('/users/{id}', [UserController::class,'update']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);

    Route::post('addCart', [CartController::class,'addToCart']);

});




