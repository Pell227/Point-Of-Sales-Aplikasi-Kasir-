<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Kasir - POS Application</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100 font-sans antialiased flex items-center justify-center h-screen">

    <div class="max-w-md w-full mx-4 p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="mb-8 text-center">
            <div class="inline-flex p-3 bg-blue-50 text-blue-600 rounded-xl mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M5.25 7.5h13.5m-12 9h10.5M5.25 10.5h13.5m-10.5 3h7.5m-7.5 3h4.5m-6.25 0h.008v.008H3.75V16.5zm0-3h.008v.008H3.75v-.008zm0-3h.008v.008H3.75V10.5zm0-3h.008v.008H3.75V7.5z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Sistem POS Kasir</h1>
            <p class="text-sm text-slate-500 mt-1">Silakan masuk untuk memulai transaksi</p>
        </div>

        @if($errors->any())
            <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl text-sm shadow-sm flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email Kasir</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh@toko.com" 
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-slate-50/50 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="••••••••" 
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-slate-50/50 transition">
            </div>

            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" 
                        class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500 cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-slate-600 select-none cursor-pointer">Ingat akun saya</label>
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg shadow-blue-500/20 transition duration-200 text-sm mt-2 cursor-pointer flex justify-center items-center space-x-2">
                <span>Masuk ke Dashboard</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-400">&copy; 2026 Point of Sales System. All rights reserved.</p>
        </div>
    </div>

</body>
</html>