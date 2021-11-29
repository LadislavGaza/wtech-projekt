<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SearchController;

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
Route::get('products/room/{room}', [ProductController::class, 'index']);
Route::get('products/room/{room}/{product}', [ProductController::class, 'show']);
Route::get('products/item/{product}', [SearchController::class, 'show']);

Route::resource('search', SearchController::class);

// Route::post('products/{product}', [ProductController::class, 'store'])->middleware(['auth']);
// Route::delete('products/{product}', [ProductController::class, 'destroy'])->middleware(['auth']);

Route::resource('cart', ShoppingCartController::class);
Route::resource('admin', AdminController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
