<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodsController;

Route::get('/', function () {
    return redirect('/paymentMethods');
});

Route::resource('paymentMethods', PaymentMethodsController::class);