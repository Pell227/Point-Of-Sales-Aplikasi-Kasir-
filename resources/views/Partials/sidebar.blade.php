<aside class="w-64 bg-white border-r border-gray-200 shadow-sm flex-col justify-between">
  <div class="p-5">

  <div class="text-xl font-bold text=blue-600 mb-6 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
    </svg>
    <span>Point of Sales (Aplikasi Kasir)</span>
  </div>

   <nav class="space-y-2">
        
        <a href="{{ url('/products') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->is('products*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Product.png') }}" alt="Product" class="w-5 h-5">
        <span>Produk</span>
            </a>
        
        <a href="{{ route('transactions.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('transactions.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Tl.png') }}" alt="Transaksi" class="w-5 h-5">
        <span>Transaksi</span> 
            </a>
        
        <a href="{{ route('Staff.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('Staff.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/staff.png') }}" alt="Staff" class="w-5 h-5">
        <span>Staff</span> 
            </a>
        @verbatim
        <a href="{{ route('Supplier.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
           {{ request()->routeIs('Supplier.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Supplier.png') }}" alt="Supplier" class="w-5 h-5">
        <span>Supplier</span>
        </a>
        @endverbatim
        
        <a href="{{ route('paymentMethods.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('paymentMethods.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Card.png') }}" alt="Metode Pembayaran" class="w-5 h-5">
        <span>Metode Pembayaran</span>
        </a>
        
        <a href="{{ route('promotions.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('promotions.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Promo.png') }}" alt="Promos" class="w-5 h-5">
        <span>Promo</span>
        </a>

        <a href="{{ route('Reports.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('Reports.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Reports.png') }}" alt="Reports" class="w-5 h-5">
        <span>Report</span>
        </a>

          </nav>
  </div>
</aside>