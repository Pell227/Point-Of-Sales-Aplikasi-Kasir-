<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\LoginWebController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\SupplierViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TransactionListController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReportsController;


Route::get('/', [LoginWebController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginWebController::class, 'login'])->name('login.post');
Route::post('/logout-web', [LoginWebController::class, 'logoutWeb'])->name('logout.web');
Route::get('/register', [LoginWebController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginWebController::class, 'register'])->name('register.post');
Route::get('/change-password', [ChangePasswordController::class, 'showChangePassword'])->name('password.change');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
Route::get('/main', function () {
    return view('layouts.main');
    });

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('layouts.main'); 
    })->name('dashboard');
    Route::resource('auth', UserWebController::class)->names('auth');


    Route::resource('staff',StaffController::class)->names('Staff');
    Route::resource('products',ProductViewController::class);
    Route::resource('suppliers',SupplierViewController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('inventory',InventoryController::class);
    Route::resource('paymentMethods',PaymentMethodsController::class);
    Route::resource('transactions',TransactionsController::class);
    Route::resource('promotions',PromotionController::class);
    Route::resource('Reports',ReportsController::class)->parameters(['Reports' => 'reports']);
 
});