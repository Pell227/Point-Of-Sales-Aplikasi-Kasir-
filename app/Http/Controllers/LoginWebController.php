<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;                    // Tambahan: Untuk mendeteksi tabel users
use Illuminate\Support\Facades\Hash;    // Tambahan: Untuk mengamankan/enkripsi password

class LoginWebController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function showLogin()
    {
        return view('Auth.login'); 
    }
    
    // 2. Memproses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('auth.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Memproses Logout
    public function logoutWeb(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // 4. Menampilkan Halaman Register (Mengatasi eror showRegister tadi)
    public function showRegister()
    {
        return view('Auth.register');
    }

    // 5. Memproses Pendaftaran Akun Kasir Baru
    public function register(Request $request)
    {
        // Validasi input data dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email ini sudah terdaftar!',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        // Menyimpan data kasir baru ke database dengan password terenkripsi
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // Kembali ke login dengan status sukses
        return redirect()->route('login')->with('success', 'Akun kasir baru berhasil didaftarkan! Silakan login.');
    }
}