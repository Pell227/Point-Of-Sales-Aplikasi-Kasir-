<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


Route::get('/register-via-browser', function (Request $request) {

    $email = $request->query('email');
    $name = $request->query('name', 'Kasir Browser');
    $password = $request->query('password', 'password123');
    
    if (!$email) {
        return response()->json([
            'status' => 'Gagal',
            'message' => 'Silakan masukkan email di URL! Contoh: ?email=kasir@gmail.com'
        ], 400);
    }
    
    if (User::where('email', $email)->exists()) {
        return response()->json([
            'status' => 'Gagal',
            'message' => 'Email ini sudah terdaftar di database MySQL!'
        ], 400);
    }

    $user = User::create
    ([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
    ]);

    return response()->json([
        'status' => 'Berhasil!',
        'message' => 'User berhasil disimpan ke MySQL via GET Browser',
        'data' => $user
    ]);
});

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::apiResource('products', ProductController::class);
