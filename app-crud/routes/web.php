<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::redirect('/', '/login');

Route::resource('/products', ProductsController::class);

Route::resource('/register', RegisterController::class);

Route::resource('/login', LoginController::class);

Route::post('/login/authenticate', [LoginController::class, 'auth'])->name('login.auth');

Route::resource('profile', ProfileController::class);

Route::post('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/my-shop', [ProfileController::class, 'myShop'])->name('myShop');

Route::post('/register-seller', [ProfileController::class, 'registerSeller'])->name('registerSeller');

Route::get('/register-seller', [ProfileController::class, 'registerView'])->name('registerView');

Route::post('/products/{id}/addToCart', [CartController::class, 'addToCart'])->name('products.addToCart');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/remove-items', [CartController::class, 'removeItems'])->name('cart.remove-items');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot.password.view');

Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');
