<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Kasir</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Sistem Kasir</h1>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk ke akun kamu</p>
        </div>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        
        <f<form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" required autofocus class="...">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="...">
            </div>
            <button type="submit" class="...">
                Masuk ke Sistem
            </button>
        </form>
    </div>

</body>
</html>