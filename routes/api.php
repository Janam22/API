<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Middleware\BasicAuthMiddleware;

// Route::controller(RegisterController::class)->group(function(){
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });

Route::post('login', [RegisterController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

// Apply Basic Auth middleware to specific routes
Route::middleware(BasicAuthMiddleware::class)->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::post('products/store', [ProductController::class, 'store']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    Route::post('profile/{id}', [ProfileController::class, 'profileupdate']);
});

//Token Based Authentication
// Route::middleware('auth:sanctum')->group(function(){
//     Route::resource('products', ProductController::class);
//     Route::post('profile/{id}', [ProfileController::class, 'profileupdate']);
// });