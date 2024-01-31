<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to the "web" middleware group.
| They are great for defining the routes for your web application. You may create something great!
|
*/

Route::redirect('/', '/register');

Route::resource('/products', ProductsController::class);

Route::resource('/register', RegisterController::class);

Route::resource('/login', LoginController::class);
Route::post('/login/authenticate', [LoginController::class, 'auth'])->name('login.auth');
