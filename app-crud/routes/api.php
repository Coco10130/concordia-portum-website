<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgotPassController;
use App\Http\Controllers\API\ProductController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/forgotPass', [ForgotPassController::class, 'forgotPassword']);

Route::get('/showProducts', [ProductController::class, 'index']);
Route::post('/addProduct', [ProductController::class, 'store']);
Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
Route::post('/addToCart/{productId}', [ProductController::class, 'addToCart']);
