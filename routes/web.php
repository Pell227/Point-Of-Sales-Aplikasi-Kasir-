<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodsController;

Route::resource('paymentMethods', PaymentMethodsController::class);