<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');

Route::get('products/{id}', [ProductController::class, 'addProductToCart'])->name('products.add.to.cart');
Route::get('shopping-cart', [ProductController::class, 'shoppingCart'])->name('shopping.cart');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
});


require __DIR__.'/auth.php';

// GET|HEAD        products ................................ products.index › Admin\ProductController@index
// POST            products ................................ products.store › Admin\ProductController@store
// GET|HEAD        products/create ....................... products.create › Admin\ProductController@create
// GET|HEAD        products/{product} ........................ products.show › Admin\ProductController@show
// PUT|PATCH       products/{product} .................... products.update › Admin\ProductController@update
// DELETE          products/{product} .................. products.destroy › Admin\ProductController@destroy
// GET|HEAD        products/{product}/edit ................... products.edit › Admin\ProductController@edit