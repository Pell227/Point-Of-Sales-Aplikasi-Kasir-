@extends('layouts.main')

@section('title', 'Promo')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Daftar Promo
            </h1>

            <p class="text-gray-500 text-sm">
                Kelola promo dan diskon toko
            </p>
        </div>

        <a href="{{ route('promotions.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Promo
        </a>

    </div>

    <table class="w-full border-collapse">

        <thead>

            <tr class="bg-gray-100">

                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama Promo</th>
                <th class="p-3 text-left">Tipe</th>
                <th class="p-3 text-left">Nilai</th>
                <th class="p-3 text-left">Minimal Belanja</th>
                <th class="p-3 text-left">Mulai</th>
                <th class="p-3 text-left">Selesai</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($promotions as $promo)

            <tr class="border-b">

                <td class="p-3">{{ $promo->id }}</td>
                <td class="p-3">{{ $promo->promo_name }}</td>
                <td class="p-3">{{ $promo->discount_type }}</td>
                <td class="p-3">{{ $promo->discount_value }}</td>
                <td class="p-3">{{ $promo->minimum_purchase }}</td>
                <td class="p-3">{{ $promo->start_date }}</td>
                <td class="p-3">{{ $promo->end_date }}</td>

                <td class="p-3">

                    @if($promo->is_active)

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Aktif
                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Tidak Aktif
                        </span>

                    @endif

                </td>

                <td class="p-3 text-center">

                    <a href="{{ route('promotions.show', $promo->id) }}"
                       class="text-blue-600 hover:underline">
                        Detail
                    </a>

                    |

                    <a href="{{ route('promotions.edit', $promo->id) }}"
                       class="text-yellow-600 hover:underline">
                        Edit
                    </a>

                    |

                    <form action="{{ route('promotions.destroy', $promo->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 hover:underline">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="9" class="p-8 text-center text-gray-500">
                    Belum ada promo
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection