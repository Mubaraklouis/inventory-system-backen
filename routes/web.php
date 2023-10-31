<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,

    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('admin/dashboard/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //creating products routes
    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/index', 'index')->name('products.index');
        Route::get('/add-product', 'create')->name('product.create');
        Route::get('show/{id}', 'show')->name('product.show');
        Route::post('/store', 'store')->name('product.store');
        Route::get('/edit/{id}', 'editProduct')->name('product.edit');
        Route::put('/store/{id}', 'update')->name('product.update');
        Route::delete('/delete/{id}', 'destroy')->name('product.delete');


    });

       //creating products routes
        Route::controller(CategoryController::class)->prefix('product/category')->group(function () {
        Route::get('/index', 'index')->name('category.index');
        Route::get('/{id}','show')->name('category.show');

    });
});





//gust routes




require __DIR__ . '/auth.php';
