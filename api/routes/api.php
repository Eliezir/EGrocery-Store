<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('products', [App\Http\Controllers\ProductController::class, 'products']);

Route::post('add_product', [App\Http\Controllers\ProductController::class, 'addProduct']);

Route::delete('delete_product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);

Route::get('product/{id}', [App\Http\Controllers\ProductController::class, 'product']);

Route::post('update_product/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);
