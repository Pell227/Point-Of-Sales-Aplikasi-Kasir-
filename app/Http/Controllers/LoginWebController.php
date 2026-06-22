<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;   

class LoginWebController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login'); 
    }
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    public function logoutWeb(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function showRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Email ini sudah terdaftar!',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);


        return redirect()->route('login')->with('success', 'Akun kasir baru berhasil didaftarkan! Silakan login.');
    }
}