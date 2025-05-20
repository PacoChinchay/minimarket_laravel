<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/products', [StoreController::class, 'products'])->name('store.products.index');
Route::get('/store/products/{product}', [StoreController::class, 'showProduct'])->name('store.products.show');
Route::get('/store/categories/{category}', [StoreController::class, 'category'])->name('store.categories.show');
Route::get('/about-us', [StoreController::class, 'aboutUs'])->name('about-us');

Route::prefix('admin')->middleware([
    'auth',
    'role:' . implode(',', [Role::ADMINISTRADOR, Role::VENDEDOR, Role::REPARTIDOR])
])->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['role:' . implode(',', [Role::ADMINISTRADOR, Role::VENDEDOR])])
        ->controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('products.index');
            Route::get('/products/create', 'create')->name('products.create');
            Route::post('/products', 'store')->name('products.store');
            Route::get('/products/{product}', 'show')->name('products.show');
            Route::get('/products/{product}/edit', 'edit')->name('products.edit');
            Route::put('/products/{product}', 'update')->name('products.update');
            Route::delete('/products/{product}', 'destroy')->name('products.destroy');
        });

    Route::middleware(['role:' . Role::ADMINISTRADOR])
        ->controller(UserController::class)->group(function () {
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/create', 'create')->name('users.create');
            Route::post('/users', 'store')->name('users.store');
            Route::get('/users/{user}/edit', 'edit')->name('users.edit');
            Route::put('/users/{user}', 'update')->name('users.update');
            Route::delete('/users/{user}', 'destroy')->name('users.destroy');
        });

    Route::middleware(['role:' . implode(',', [Role::ADMINISTRADOR, Role::VENDEDOR])])
        ->controller(CategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('categories.index');
            Route::get('/categories/create', 'create')->name('categories.create');
            Route::post('/categories', 'store')->name('categories.store');
            Route::get('/categories/{category}', 'show')->name('categories.show');
            Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
            Route::put('/categories/{category}', 'update')->name('categories.update');
            Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
            Route::delete('/categories/{category}/products/{product}', 'detachProduct')->name('categories.products.detach');
        });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');

        Route::post('/{order}', [OrderController::class, 'updateStatus'])
            ->middleware(['role:' . implode(',', [Role::ADMINISTRADOR, Role::REPARTIDOR])])
            ->name('orders.update-status');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/store/cart', [CartController::class, 'index'])->name('store.cart');
    Route::post('/store/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/store/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/store/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/store/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');

Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');

Route::post('/validate-register', [LoginController::class, 'register'])->name('auth.register');
Route::post('/star-session', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/prueba-livewire', function () {
    return view('prueba-livewire');
});

Route::get('/buscar-productos', [ProductController::class, 'buscar'])->name('productos.buscar');
