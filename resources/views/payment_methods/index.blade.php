@extends('layouts.main')

@section('title', 'payment_methods')

@section('content')

<h1>Daftar Metode Pembayaran</h1>

@if(session('success'))

    <p style="color:green">
        {{ session('success') }}
    </p>

@endif

<a href="{{ route('paymentMethods.create') }}">
    Tambah Metode Pembayaran
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Metode Pembayaran</th>
        <th>Jenis Pembayaran</th>
        <th>Tipe</th>
        <th>Provider</th>
        <th>Aksi</th>

    </tr>

    @foreach($paymentMethods as $item)

    <tr>

        <td>{{ $item->id }}</td>
        <td>{{ $item->payment_method }}</td>
        <td>{{ $item->payment_type }}</td>
        <td>{{ $item->payment_category }}</td>
        <td>{{ $item->provider }}</td>

        <td>

            <a href="{{ route('paymentMethods.edit', $item->id) }}">
                Edit
            </a>

            <form action="{{ route('paymentMethods.destroy', $item->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection