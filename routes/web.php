<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;

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

Route::get('/', function () {  return view('index'); });
// Route::resource('products', ProductController::class);
//Route::resource('products/{room}', ProductController::class);
// Route::get('products', [ProductController::class, 'index']);
Route::get('products/{room}', [ProductController::class, 'index']);
Route::get('products/{room}/{product}', [ProductController::class, 'show']);
// Route::post('products/{product}', [ProductController::class, 'store'])->middleware(['auth']);
// Route::delete('products/{product}', [ProductController::class, 'destroy'])->middleware(['auth']);

Route::resource('cart', ShoppingCartController::class);
Route::resource('admin', AdminController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
