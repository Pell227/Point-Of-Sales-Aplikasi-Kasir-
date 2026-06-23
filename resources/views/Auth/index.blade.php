@extends('layouts.main')

@section('title', 'report')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kasir - Aplikasi POS</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Pengguna / Kasir</h1>
                <p class="text-sm text-gray-500">Kelola hak akses pengguna aplikasi Point of Sales</p>
            </div>
            <a href="/auth/create" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200 text-sm">
                + Tambah Kasir Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-50 text-gray-700 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Tanggal Dibuat</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('auth.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Detail</a>
                                <a href="{{ route('auth.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-900 font-medium">Edit</a>
                                <form action="{{ route('auth.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kasir ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium cursor-pointer">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
@endofsection