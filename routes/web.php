<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;

Route::get('/', [StaffController::class, 'index']);

Route::get('/', function () {
    return redirect('/paymentMethods');
});


Route::get('/', [TransactionsController::class, 'index']);

Route::resource('staff', StaffController::class)->names('Staff');
Route::resource('paymentMethods', PaymentMethodsController::class);
Route::resource('transactions', TransactionsController::class);
