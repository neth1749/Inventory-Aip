<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::apiResource('categories', CategoryController::class);
// Route::apiResource('products', ProductController::class);

Route::get('/get_all_products', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/categories',[CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'show']);
Route::get('/categories/{id}', [CategoryController::class, 'showById']);
Route::get('/products/{id}', [ProductController::class, 'showById']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::put('/products/{product_id}', [ProductController::class, 'update']);

Route::get('/products', [ProductController::class, 'filterByCategory']);
Route::get('/products', [ProductController::class, 'getProductByPage']);







