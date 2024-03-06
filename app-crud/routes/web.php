<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
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

Route::redirect('/', '/products');


Route::resource('/login', LoginController::class);

Route::resource('/products', ProductsController::class);

Route::get('/register', [LoginController::class, 'registerView'])->name('register.view');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout.auth');

Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::post('/login/authenticate', [LoginController::class, 'auth'])->name('login.auth');

Route::resource('profile', ProfileController::class);

Route::post('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/my-shop', [ProfileController::class, 'myShop'])->name('myShop');

Route::get('/my-purchases', [ProfileController::class, 'purchaseView'])->name('myPurchases');

Route::post('/register-seller', [ProfileController::class, 'registerSeller'])->name('registerSeller');

Route::get('/register-seller', [ProfileController::class, 'registerView'])->name('registerView');

Route::post('/products/{id}/addToCart', [CartController::class, 'addToCart'])->name('productsAddToCart');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/check-out', [CartController::class, 'checkOut'])->name('cart.checkout');

Route::get('/check-out', [CartController::class, 'checkOutView'])->name('cart.checkout.view');

Route::post('/place-order', [CartController::class, 'placeOrder'])->name('place.order');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot.password.view');

Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

Route::get('/products/{product}/edit', [ProductsController::class, 'editProduct'])->name('products.edit');

Route::put('/products/{product}', [ProductsController::class, 'updateProduct'])->name('products.update');

Route::delete('/products/{product}', [ProductsController::class, 'deleteProduct'])->name('products.destroy');
