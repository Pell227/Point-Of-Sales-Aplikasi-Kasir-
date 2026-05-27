<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::get('/', [StaffController::class, 'index']);

Route::resource('staff', StaffController::class)->names('Staff');