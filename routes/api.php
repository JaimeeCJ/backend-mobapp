<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SearchController;

Route::get('/users', [UserController::class, 'index']); 
Route::get('/users/{id}', [UserController::class, 'show']); 
Route::get('/products/{qty}', [ProductController::class, 'index']);
Route::get('/promotion/{qty}', [PromotionController::class, 'index']); 
Route::get('/products/search/{query}', [SearchController::class, 'search']);


Route::get('/', function (){
    return response()->json([
        'success'=>true
    ]);
});