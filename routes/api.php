<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Rute GET khusus untuk mendaftar langsung dari browser
Route::get('/register-via-browser', function (Request $request) {
    
    // Ambil data dari query parameter di URL
    $email = $request->query('email');
    $name = $request->query('name', 'Kasir Browser'); // default name jika tidak diisi
    $password = $request->query('password', 'password123'); // default password jika tidak diisi

    // Validasi minimal: pastikan email diisi di URL
    if (!$email) {
        return response()->json([
            'status' => 'Gagal',
            'message' => 'Silakan masukkan email di URL! Contoh: ?email=kasir@gmail.com'
        ], 400);
    }

    // Cek apakah email sudah terdaftar di MySQL
    if (User::where('email', $email)->exists()) {
        return response()->json([
            'status' => 'Gagal',
            'message' => 'Email ini sudah terdaftar di database MySQL!'
        ], 400);
    }

    // Buat user baru ke database
    $user = User::create([
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