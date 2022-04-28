<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::view('/about-us', 'about');

Route::get('/hello-world/{name}-{edad}', [\App\Http\Controllers\Controller::class, 'helloWorld']);
Route::group([
    'prefix' => '{len}',
    'middleware' => 'setLocale',
    'where' => [
        'len' => 'es|en'
    ]
], function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');//->withoutMiddleware('setLocale');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
       // ->middleware('permission:destroy_product')
        ->name('products.destroy');
});
