@extends('layouts.main')

@section('title','Detail Product')

@section('content')

<div class="max-w-4xl mx-auto">

```
<div class="bg-white rounded-xl shadow overflow-hidden">

    <div class="grid md:grid-cols-2">

        <div class="bg-gray-50 flex items-center justify-center p-8">

            <img
                src="{{ asset('Assets/Products/' . ($product->image ?? 'McCafe.webp')) }}"
                class="max-h-96 object-contain">

        </div>

        <div class="p-8">

            <h1 class="text-4xl font-bold mb-6">
                {{ $product->name }}
            </h1>

            <div class="space-y-4">

                <div>
                    <p class="text-gray-500">
                        ID Product
                    </p>

                    <p class="font-semibold">
                        #{{ $product->id }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">
                        Supplier
                    </p>

                    <p class="font-semibold">
                        {{ $product->supplier->name ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">
                        Stock
                    </p>

                    <p class="font-semibold">
                        {{ $product->stock }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">
                        Harga
                    </p>

                    <p class="text-3xl font-bold text-green-600">
                        Rp {{ number_format($product->price) }}
                    </p>
                </div>

            </div>

            <div class="flex gap-3 mt-8">

                <a href="{{ route('products.edit',$product->id) }}"
                   class="bg-yellow-500 text-white px-5 py-3 rounded-lg">

                    Edit Product

                </a>

                <a href="{{ route('products.index') }}"
                   class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
