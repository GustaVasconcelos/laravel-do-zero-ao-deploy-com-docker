<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/product', [ApiProductsController::class,'store']);
Route::get('/product', [ApiProductsController::class,'index']);
Route::get('/product/{id}', [ApiProductsController::class,'show']);
Route::put('/product/{id}', [ApiProductsController::class,'update']);
Route::delete('/product/{id}', [ApiProductsController::class,'destroy']);