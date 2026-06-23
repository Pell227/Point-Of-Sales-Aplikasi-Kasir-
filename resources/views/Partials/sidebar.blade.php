<aside class="w-64 bg-white border-r border-gray-200 shadow-sm flex-col justify-between">
  <div class="p-5">

  <div class="text-xl font-bold text-blue-600 mb-6 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
      <img src="{{ asset('Assets/Icons/POS.png') }}" alt="POS" class="w-5 h-5">
    </svg>
    <span>YesPos</span>
  </div>

   <nav class="space-y-2">
        
        <h1 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Main Menu</h1>

        <a href="{{ route('categories.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->is('categories*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Category.png') }}" alt="Product" class="w-5 h-5">
        <span>Category</span>
        </a>

        <a href="{{ route('products.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->is('products*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Product.png') }}" alt="Product" class="w-5 h-5">
        <span>Produk</span>
        </a>

        <a href="{{ route('inventory.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->is('inventory*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Inventory.png') }}" alt="Product" class="w-5 h-5">
        <span>Inventory</span>
        </a>
        
        <a href="{{ route('transactions.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('transactions.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Tl.png') }}" alt="Transaksi" class="w-5 h-5">
        <span>Transaksi</span> 
        </a>

        <a href="{{ route('transaction_lists.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('transaction_lists.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Tl.png') }}" alt="Transaksion List" class="2-5 h-5">
        <span>Transaction List</span>
        </a>
        
        <a href="{{ route('Staff.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
          {{ request()->routeIs('Staff.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/staff.png') }}" alt="Staff" class="w-5 h-5">
        <span>Staff</span> 
            </a>

        <a href="{{ route('suppliers.index') }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
           {{ request()->routeIs('suppliers.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
        <img src="{{ asset('Assets/Icons/Supplier.png') }}" alt="Supplier" class="w-5 h-5">
        <span>Supplier</span>
        </a>

        
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

        <form action="{{ route('logout') }}" method="POST" class="mt-4 pt-4 border-t border-gray-100">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition-colors cursor-pointer text-left">
                <img src="{{ asset('Assets/Icons/Auth.png') }}" alt="Logout" class="w-5 h-5">
                <span>Logout</span>
            </button>
        </form>

    </nav>
  </div>
</aside>