<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\LoginWebController;
use App\Http\Controllers\UserWebController;

Route::get('/cek-menu', function () {
    return view('main');
});

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


Route::get('/staff', [StaffController::class, 'index']);

Route::get('/', [LoginWebController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginWebController::class, 'login'])->name('login.post');
Route::post('/logout-web', [LoginWebController::class, 'logoutWeb'])->name('logout.web');

Route::middleware('auth')->group(function () {
    Route::resource('auth', UserWebController::class);
});

Route::resource('staff', StaffController::class)->names('Staff');
Route::resource('paymentMethods', PaymentMethodsController::class);
Route::resource('transactions', TransactionsController::class);
