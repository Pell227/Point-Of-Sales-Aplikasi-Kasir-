<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;

Route::post('/products', function (Request $request) {

    Product::create([
        'name' => $request->name,
        'stock' => $request->stock,
        'price' => $request->price,
    ]);

    return redirect('/products');
});

Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::get('/', [StaffController::class, 'index']);

Route::get('/', function () {
    return redirect('/paymentMethods');
});

Route::get('/', [TransactionsController::class, 'index']);

Route::resource('staff', StaffController::class)->names('Staff');
Route::resource('paymentMethods', PaymentMethodsController::class);
Route::resource('transactions', TransactionsController::class);
