@extends('layouts.main')

@section('title','POS')

@section('content')

<div class="grid grid-cols-12 gap-6">

    <!-- Produk -->
    <div class="col-span-8">

        <h1 class="text-3xl font-bold mb-6">
            Point Of Sales
        </h1>

        <div class="grid grid-cols-4 gap-4">

            @foreach($products as $product)

            <form action="{{ route('cart.add',$product->id) }}"
                  method="POST">

                @csrf

                <button
                    class="w-full bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                        <img
                            src="{{ asset('Assets/Products/' . ($product->image ?? 'Kosong.jpg')) }}"
                            class="h-40 w-full object-cover">

                    <div class="p-4">

                        <h3 class="font-semibold">
                            {{ $product->name }}
                        </h3>

                        <p class="text-green-600 font-bold">
                            Rp {{ number_format($product->price) }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Stock : {{ $product->stock }}
                        </p>

                    </div>

                </button>

            </form>

            @endforeach

        </div>

    </div>

    <!-- Cart -->
    <div class="col-span-4">

        <div class="bg-white rounded-xl shadow p-5 sticky top-5">

            <h2 class="text-xl font-bold mb-4">
                Cart
            </h2>

            @php
                $total = 0;
            @endphp

            @if(session('cart'))

                @foreach(session('cart') as $id => $item)

                    @php
                        $subtotal =
                        $item['price'] *
                        $item['quantity'];

                        $total += $subtotal;
                    @endphp

                    <div class="border-b py-3">

                        <h4 class="font-semibold">
                            {{ $item['name'] }}
                        </h4>

                        <p>
                            Rp {{ number_format($item['price']) }}
                        </p>

                        <div class="flex items-center gap-2 mt-2">

                            <form action="{{ route('cart.update',$id) }}"
                                  method="POST">

                                @csrf

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="w-16 border rounded px-2">

                                <button
                                    class="bg-blue-500 text-white px-3 py-1 rounded">

                                    Update
                                </button>

                            </form>

                            <form action="{{ route('cart.remove',$id) }}"
                                  method="POST">

                                @csrf

                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded">

                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            @endif

            <div class="mt-5">

                <h3 class="text-xl font-bold">

                    Total :
                    Rp {{ number_format($total) }}

                </h3>

                <button
                    class="w-full bg-green-600 text-white mt-4 py-3 rounded-lg">

                    Checkout

                </button>

            </div>

        </div>

    </div>

</div>

@endsection