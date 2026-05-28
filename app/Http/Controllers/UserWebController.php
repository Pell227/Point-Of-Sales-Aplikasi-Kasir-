<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserWebController extends Controller
{
    // 1. Menampilkan semua data kasir (Index)
    public function index()
    {
        $users = User::all(); // Mengambil semua data dari tabel 'users'
        return view('Auth.index', compact('users'));
    }

    // 2. Menampilkan halaman form tambah kasir (Create)
    public function create()
    {
        return view('Auth.create');
    }

    // 3. Menyimpan data kasir baru ke database (Store)
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

    // 4. Menampilkan detail satu kasir (Show)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('Auth.show', compact('user'));
    }

    // 5. Menampilkan halaman form edit (Edit)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Auth.edit', compact('user'));
    }

    // 6. Memperbarui data kasir di database (Update)
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

        // Jika password diisi, maka update password-nya
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('auth.index')->with('success', 'Data Kasir berhasil diperbarui!');
    }

    // 7. Menghapus data kasir (Destroy)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('auth.index')->with('success', 'Akun Kasir berhasil dihapus!');
    }
}