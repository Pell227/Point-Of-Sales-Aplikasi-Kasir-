<!DOCTYPE HTML>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Point Of Sales - @yield('title', 'Dashboard')</title>
  </head>
  <body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">

      <aside class="w-64 bg-white border-r border-gray-200 shadow-sm flex flex-col justify-between">
        <div class="p-5">

          <div class="text-xl font-bold text-blue-600 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span>Aplikasi Kasir</span>
          </div>

          <nav class="space-y-2">
            <a href="{{ url('/products') }}"
               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
                      {{ request()->is('products*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
              <span>📦</span> Produk
            </a>
            <a href="{{ route('transactions.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
                      {{ request()->routeIs('transactions.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
              <span>🧾</span> Transaksi
            </a>
            <a href="{{ route('Staff.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
                      {{ request()->routeIs('Staff.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
              <span>👥</span> Staff
            </a>
            <a href="{{ route('paymentMethods.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
                      {{ request()->routeIs('paymentMethods.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
              <span>💳</span> Metode Pembayaran
            </a>
          </nav>
        </div>
      </aside>

      <main class="flex-1 p-8">
        @yield('content')
      </main>

    </div>

  </body>
</html>