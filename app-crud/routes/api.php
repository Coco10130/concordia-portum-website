<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgotPassController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\CartController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgotPass', [ForgotPassController::class, 'forgotPassword']);
Route::get('/showProducts', [ProductController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/updateProfile', [ProfileController::class, 'updateProfile']);
    Route::post('/registerSeller', [ProfileController::class, 'registerSeller']);
    Route::get('/showProfile', [ProfileController::class, 'showProfile']);
    Route::get('/myPurchase', [ProfileController::class, 'purchaseView']);

    Route::post('/editProduct', [ProductController::class, 'updateProduct']);
    Route::post('/addCart/{productId}', [ProductController::class, 'addToCart']);

    Route::get('/showCart', [CartController::class, 'index']);
    Route::post('/checkOut', [CartController::class, 'checkOut']);
    Route::get('/checkOutView', [CartController::class, 'checkOutView']);
    Route::post('/placeOrder', [CartController::class, 'placeOrder']);
    Route::get('/indexAndroid', [CartController::class, 'index']);
});

/* Route::get('/indexAndroid', [CartController::class, 'indexAndroid']); */
