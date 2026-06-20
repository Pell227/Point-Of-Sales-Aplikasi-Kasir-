<?php

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController; 
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TransactionListController;
use App\Http\Controllers\LoginWebController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CategoryController;

Route::get('/cek-menu', function () {
    return view('layouts.main');
});

Route::post('/transactions', function (Request $request) {

    transactions::create([
        'id' => $request->id,
        'name' => $request->name,
        'amount' => $request->amount,
        'tax' => $request->tax,
        'status' => $request->status,
        'date' => $request->date,
    ]);

    return redirect('/transactions');
});

Route::post('/transactionlists', function (Request $request) {

    TransactionList::create([
        'transaction_id' => $request->transaction_id,
        'receipt_id' => $request->receipt_id,
        'cashier_id' => $request->cashier_id,
        'cashier_name' => $request->cashier_name,
        'store_id' => $request->store_id,
        'description' => $request->description,
        'amount' => $request->amount,
        'total' => $request->total,
    ]);

    return redirect('/transactionlists');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::middleware(['auth'])->group(function () {
});
Route::resource('categories', CategoryController::class)->names([
    'create' => 'category.create'
]);
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

Route::get('/', [StaffController::class, 'index']);

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/transactions', function () {
    $transactions = transactions::all();
    return view('transactions', compact('transactions'));
});

Route::get('/transactionlists', function () {
    $transactionlists = TransactionList::all();
    return view('transactionlists', compact('transactionlists'));
});

Route::get('/', [TransactionsController::class, 'index']);
Route::get('/products-view', [ProductViewController::class, 'index']);
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
Route::resource('products', ProductController::class);
Route::resource('promotions', PromotionController::class);

Route::resource('categories', CategoryController::class)->names([
    'create' => 'categories.create'
]);

Route::resource('transactionlists', TransactionListController::class);

