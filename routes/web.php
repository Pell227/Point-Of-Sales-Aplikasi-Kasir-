<?php

use App\Http\Controllers\LoginWebController;
use App\Http\Controllers\UserWebController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [LoginWebController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginWebController::class, 'login'])->name('login.post');
Route::post('/logout-web', [LoginWebController::class, 'logoutWeb'])->name('logout.web');

Route::middleware('auth')->group(function () {
    Route::resource('auth', UserWebController::class);
});