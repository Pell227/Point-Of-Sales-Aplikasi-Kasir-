@extends('layouts.main')

@section('title','Detail Supplier')

@section('content')

<div class="max-w-3xl mx-auto">

```
<div class="bg-white rounded-xl shadow overflow-hidden">

    <div class="bg-green-600 text-white p-8">

        <h1 class="text-3xl font-bold">
            {{ $supplier->name }}
        </h1>

        <p class="opacity-80 mt-2">
            Supplier Information
        </p>

    </div>

    <div class="p-8">

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-gray-50 p-5 rounded-lg">

                <p class="text-gray-500 mb-1">
                    ID Supplier
                </p>

                <p class="font-bold text-lg">
                    #{{ $supplier->id }}
                </p>

            </div>

            <div class="bg-gray-50 p-5 rounded-lg">

                <p class="text-gray-500 mb-1">
                    Nomor Telepon
                </p>

                <p class="font-bold text-lg">
                    {{ $supplier->phone }}
                </p>

            </div>

        </div>

        <div class="bg-gray-50 p-5 rounded-lg mt-6">

            <p class="text-gray-500 mb-2">
                Alamat
            </p>

            <p class="font-medium">
                {{ $supplier->address }}
            </p>

        </div>

        <div class="flex gap-3 mt-8">

            <a href="{{ route('suppliers.edit',$supplier->id) }}"
               class="bg-yellow-500 text-white px-5 py-3 rounded-lg">

                Edit Supplier

            </a>

            <a href="{{ route('suppliers.index') }}"
               class="bg-gray-500 text-white px-5 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </div>

</div>
```

</div>

@endsection
