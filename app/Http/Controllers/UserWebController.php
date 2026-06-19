<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserWebController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Auth.index', compact('users'));
    }
    public function create()
    {
        return view('Auth.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.index')->with('success', 'Akun Kasir berhasil ditambahkan!');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('Auth.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Auth.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('auth.index')->with('success', 'Data Kasir berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.index')->with('success', 'Akun Kasir berhasil dihapus!');
    }
}