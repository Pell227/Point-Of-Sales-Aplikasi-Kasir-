<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\StaffController;

Route::get('/', [StaffController::class, 'index']);

Route::get('/', function () {
    return redirect('/paymentMethods');
});

Route::resource('staff', StaffController::class)->names('Staff');
Route::resource('paymentMethods', PaymentMethodsController::class);


