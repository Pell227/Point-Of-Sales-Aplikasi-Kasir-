@extends('layouts.main')

@section('title','POS')

@section('content')

<div class="grid grid-cols-12 gap-6">

    <div class="col-span-8">

        <h1 class="text-3xl font-bold mb-4">Point Of Sales</h1>

        <div class="mb-4 flex flex-col gap-3">

            <input
                type="text"
                id="searchInput"
                placeholder="Cari produk..."
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                onkeyup="filterProducts()">

            <div class="flex flex-wrap gap-2">
                <button
                    onclick="filterCategory('all')"
                    class="category-btn active-cat px-4 py-1.5 rounded-full text-sm font-medium border border-blue-500 bg-blue-500 text-white transition"
                    data-cat="all">
                    Semua
                </button>

                @foreach($categories as $cat)
                <button
                    onclick="filterCategory('{{ $cat->id }}')"
                    class="category-btn px-4 py-1.5 rounded-full text-sm font-medium border border-gray-300 text-gray-600 hover:border-blue-400 hover:text-blue-500 transition"
                    data-cat="{{ $cat->id }}">
                    {{ $cat->nameK }}
                </button>
                @endforeach
            </div>

        </div>

        <div class="grid grid-cols-4 gap-4" id="productGrid">

            @foreach($products as $product)
            <div class="product-card"
                 data-name="{{ strtolower($product->name) }}"
                 data-cat="{{ $product->category_id ?? 'none' }}">

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden text-left
                               {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                        {{ $product->stock == 0 ? 'disabled' : '' }}>

                        <img
                            src="{{ asset('Assets/Products/' . ($product->image ?? 'Kosong.jpg')) }}"
                            class="h-40 w-full object-cover">

                        <div class="p-4">
                            <h3 class="font-semibold text-sm">{{ $product->name }}</h3>
                            <p class="text-green-600 font-bold text-sm">
                                Rp {{ number_format($product->price) }}
                            </p>
                            <p class="text-xs mt-1 {{ $product->stock == 0 ? 'text-red-400' : 'text-gray-400' }}">
                                {{ $product->stock == 0 ? 'Habis' : 'Stock: ' . $product->stock }}
                            </p>
                        </div>

                    </button>
                </form>

            </div>
            @endforeach

        </div>

        <p id="emptyMsg" class="hidden text-center text-gray-400 mt-10">Produk tidak ditemukan.</p>

    </div>

    <div class="col-span-4">
        <div class="bg-white rounded-xl shadow p-5 sticky top-5">

            <h2 class="text-xl font-bold mb-4">Cart</h2>

            @php $total = 0; @endphp

            @if(session('cart'))
                @foreach(session('cart') as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="border-b py-3">
                        <h4 class="font-semibold text-sm">{{ $item['name'] }}</h4>
                        <p class="text-sm text-gray-500">Rp {{ number_format($item['price']) }}</p>

                        <div class="flex items-center gap-2 mt-2">
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-1">
                                @csrf
                                <input type="number" name="quantity"
                                    value="{{ $item['quantity'] }}" min="1"
                                    class="w-16 border rounded px-2 py-1 text-sm">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Update</button>
                            </form>

                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-400 text-sm text-center py-4">Cart masih kosong</p>
            @endif

            <div class="mt-5">
                <h3 class="text-xl font-bold">Total : Rp {{ number_format($total) }}</h3>

                <a href="{{ route('checkout.form') }}"
                   class="block w-full bg-green-600 hover:bg-green-700 text-white text-center mt-4 py-3 rounded-lg font-semibold transition">
                    Checkout
                </a>
            </div>

        </div>
    </div>

</div>

@push('scripts')
<script>
    let activeCat = 'all';

    function filterCategory(catId) {
        activeCat = catId;

        document.querySelectorAll('.category-btn').forEach(btn => {
            if (btn.dataset.cat === catId) {
                btn.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
                btn.classList.remove('text-gray-600', 'border-gray-300');
            } else {
                btn.classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
                btn.classList.add('text-gray-600', 'border-gray-300');
            }
        });

        filterProducts();
    }

    function filterProducts() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const cards  = document.querySelectorAll('.product-card');
        let visible  = 0;

        cards.forEach(card => {
            const nameMatch = card.dataset.name.includes(search);
            const catMatch  = activeCat === 'all' || card.dataset.cat === activeCat;

            if (nameMatch && catMatch) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('emptyMsg').classList.toggle('hidden', visible > 0);
    }
</script>
@endpush

@endsection