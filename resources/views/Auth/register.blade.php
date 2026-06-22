<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Aplikasi Kasir</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg mx-4">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h1>
        </div>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white text-gray-900" style="border: 1px solid #d1d5db; padding: 8px; width: 100%; border-radius: 6px;">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white text-gray-900" style="border: 1px solid #d1d5db; padding: 8px; width: 100%; border-radius: 6px;">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white text-gray-900" style="border: 1px solid #d1d5db; padding: 8px; width: 100%; border-radius: 6px;">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm mt-4 cursor-pointer" style="background-color: #2563eb; color: white; width: 100%; padding: 10px; border-radius: 8px; border: none; font-weight: 600; cursor: pointer;">Daftar Sekarang</button>
        </form>
        <div class="text-center mt-4 text-xs">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sudah punya akun? Login</a>
        </div>
    </div>
</body>
</html>