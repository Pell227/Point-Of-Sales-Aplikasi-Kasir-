<?php

<<<<<<< HEAD
use App\Http\Controllers\LoginWebController;
use App\Http\Controllers\UserWebController;
=======
use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::post('/products', function (Request $request) {

    Product::create([
        'name' => $request->name,
        'stock' => $request->stock,
        'price' => $request->price,
    ]);

    return redirect('/products');
});
>>>>>>> e3d9a8f2a5c8738396036c4f04e59c7db3f8ab48
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;

Route::get('/', [StaffController::class, 'index']);


Route::get('/', function () {
<<<<<<< HEAD
    return redirect('/login');
});


Route::get('/login', [LoginWebController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginWebController::class, 'login'])->name('login.post');
Route::post('/logout-web', [LoginWebController::class, 'logoutWeb'])->name('logout.web');

Route::middleware('auth')->group(function () {
    Route::resource('auth', UserWebController::class);
});
=======
    return redirect('/paymentMethods');
});


Route::get('/', [TransactionsController::class, 'index']);

Route::resource('staff', StaffController::class)->names('Staff');
Route::resource('paymentMethods', PaymentMethodsController::class);
Route::resource('transactions', TransactionsController::class);
>>>>>>> e3d9a8f2a5c8738396036c4f04e59c7db3f8ab48
