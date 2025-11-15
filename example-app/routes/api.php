<?php

use App\Http\Controllers\Api\CategoriProductController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::resource('/categori-product',CategoriProductController::class);

    Route::resource('/products', ProductController::class); 
    Route::get('/products', [ProductController::class, 'index']);

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
