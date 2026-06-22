@extends('layouts.main')

@section('title', 'Supplier')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">
            Supplier Management
        </h1>

        <p class="text-gray-500">
            Kelola data supplier
        </p>

    </div>

    <a href="{{ route('suppliers.create') }}"
       class="bg-green-600 text-white px-5 py-3 rounded-lg shadow">

        + Tambah Supplier

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-5">
    {{ session('success') }}
</div>

@endif

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    @foreach($suppliers as $supplier)

    <div class="bg-white rounded-xl shadow p-5">

        <h2 class="font-bold text-xl mb-3">
            {{ $supplier->name }}
        </h2>

        <div class="space-y-2 text-gray-600">

            <p>
                📞 {{ $supplier->phone }}
            </p>

            <p>
                📍 {{ $supplier->address }}
            </p>

        </div>

        <div class="flex gap-2 mt-5">

            <a href="{{ route('suppliers.show',$supplier->id) }}"
               class="flex-1 bg-blue-500 text-white text-center py-2 rounded">

                Detail

            </a>

            <a href="{{ route('suppliers.edit',$supplier->id) }}"
               class="flex-1 bg-yellow-500 text-white text-center py-2 rounded">

                Edit

            </a>

        </div>

        <form action="{{ route('suppliers.destroy',$supplier->id) }}"
              method="POST"
              class="mt-2">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Hapus supplier ini?')"
                class="w-full bg-red-500 text-white py-2 rounded">

                Hapus

            </button>

        </form>

    </div>

    @endforeach

</div>

@endsection