<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DeliveryPlaceController;
use App\Http\Controllers\FinishOrderController;


Route::get('/', function () {  return view('index'); });
Route::get('products/{room}', [ProductController::class, 'index']);
Route::get('products/{room}/{product}', [ProductController::class, 'show']);
Route::get('search/{product}', [SearchController::class, 'show']);
Route::resource('search', SearchController::class);
Route::resource('cart', ShoppingCartController::class);
Route::resource('order', OrderController::class);
Route::get('places', [DeliveryPlaceController::class, 'index']);
Route::resource('finish-order', FinishOrderController::class);

Route::get('admin', [AdminLoginController::class, 'create']); //->middleware('guest');
Route::post('admin', [AdminLoginController::class, 'store']); //->middleware('guest');
Route::resource('admin/stock', AdminController::class)->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';
