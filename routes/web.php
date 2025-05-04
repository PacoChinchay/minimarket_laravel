<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index']);
Route::get('/store/products', [StoreController::class, 'products']);
Route::get('/store/products/{product}', [StoreController::class, 'showProduct']);
Route::get('/store/categories/{category}', [StoreController::class, 'category']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
Route::delete('/categories/{category}/products/{product}', [CategoryController::class, 'detachProduct'])->name('categories.products.detach');


Route::post('/orders', [OrderController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}/edit', [UserController::class, 'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');
Route::view('/private', "secret")->middleware('auth')->name('private');

Route::post('/validate-register', [LoginController::class, 'register'])->name('validate-register');
Route::post('/star-session', [LoginController::class, 'login'])->name('star-session');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::post('/store/cart/add', [OrderController::class, 'addToCart'])->name('cart.add');