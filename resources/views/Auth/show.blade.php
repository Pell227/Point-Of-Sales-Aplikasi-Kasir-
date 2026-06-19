<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kasir - Aplikasi POS</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="mb-6 border-b border-gray-100 pb-4">
            <h1 class="text-2xl font-bold text-gray-800">Profil Kasir</h1>
            <p class="text-sm text-gray-500">Informasi lengkap akun pengguna</p>
        </div>
        
        <div class="space-y-4">
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-sm font-medium text-gray-500">Nama Lengkap</span>
                <span class="text-sm font-semibold text-gray-800">{{ $user->name }}</span>
            </div>
            
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-sm font-medium text-gray-500">Alamat Email</span>
                <span class="text-sm font-semibold text-gray-800">{{ $user->email }}</span>
            </div>
            
            <div class="flex justify-between items-center py-2 border-b border-gray-50">
                <span class="text-sm font-medium text-gray-500">Status Akun</span>
                <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Aktif</span>
            </div>
            <div class="flex justify-between items-center py-2">
                <span class="text-sm font-medium text-gray-500">Bergabung Sejak</span>
                <span class="text-sm text-gray-800">{{ $user->created_at->format('d M Y') }}</span>
            </div>
        </div>
        <div class="flex justify-between pt-6 border-t border-gray-100 mt-6">
            <a href="{{ route('auth.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center">
                ← Kembali ke Daftar
            </a>
            <a href="{{ route('auth.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1.5 px-4 rounded-lg text-sm shadow transition">
                Edit Profil
            </a>
        </div>
    </div>

</body>
</html>