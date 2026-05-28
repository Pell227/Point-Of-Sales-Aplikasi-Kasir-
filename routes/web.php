<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;

Route::get('/', [TransactionsController::class, 'index']);
Route::resource('transactions', TransactionsController::class);