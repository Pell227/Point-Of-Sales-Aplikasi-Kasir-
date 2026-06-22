@extends('layouts.main')

@section('title', 'Metode Pembayaran')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold">
                Daftar Metode Pembayaran
            </h1>

            <p class="text-gray-500">
                Kelola metode pembayaran toko
            </p>
        </div>

        <a href="{{ route('paymentMethods.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">

            + Tambah Metode

        </a>

    </div>

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Metode</th>
                <th class="p-3 text-left">Jenis</th>
                <th class="p-3 text-left">Tipe</th>
                <th class="p-3 text-left">Provider</th>
                <th class="p-3 text-left">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($paymentMethods as $item)

            <tr class="border-b">

                <td class="p-3">{{ $item->id }}</td>

                <td class="p-3">
                    {{ $item->payment_method }}
                </td>

                <td class="p-3">
                    {{ $item->payment_type }}
                </td>

                <td class="p-3">
                    {{ $item->payment_category }}
                </td>

                <td class="p-3">
                    {{ $item->provider }}
                </td>

                <td class="p-3">

                    <a href="{{ route('paymentMethods.edit', $item->id) }}"
                       class="text-yellow-600">

                        Edit

                    </a>

                    |

                    <form action="{{ route('paymentMethods.destroy',$item->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-600">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection