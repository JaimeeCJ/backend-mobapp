<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']); 
Route::get('/users/{id}', [UserController::class, 'show']); 
Route::get('/products', [ProductController::class, 'index']);
Route::get('/promotion/{id}', [PromotionController::class, 'index']); 

Route::get('/', function (){
    return response()->json([
        'success'=>true
    ]);
});