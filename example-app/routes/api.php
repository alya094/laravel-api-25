<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriProductController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/auth')->group(function () {
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('v1')->group(function () {
    Route::resource('/product-categories',CategoriProductController::class);
    Route::resource('/product-variant',ProductVariantController::class);


    Route::resource('/products', ProductController::class); 

    Route::resource('vendors', VendorController::class);
    Route::post('/products-store', [ProductController::class, 'store']);

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    
    Route::get('/halo', function () {
        return 'Halo, Laravel!';
        });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
