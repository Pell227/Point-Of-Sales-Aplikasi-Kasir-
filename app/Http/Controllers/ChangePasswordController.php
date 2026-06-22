<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function showChangePassword()
    {
        return view('Auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect()->route('login')->with('success', 'Password berhasil diperbarui!');
        }
        return back()->withErrors(['email' => 'Email tidak ditemukan.']);
    }
}