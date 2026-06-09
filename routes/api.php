<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::apiResource('products', ProductController::class);
Route::apiResource('suppliers', SupplierController::class);