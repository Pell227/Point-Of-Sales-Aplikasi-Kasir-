<?php

use App\Http\Controllers\UserWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('auth', UserWebController::class);