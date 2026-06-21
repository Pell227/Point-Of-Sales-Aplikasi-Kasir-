@extends('layouts.main')

@section('title', 'report')

@section('content')

<h1> Daftar Reports </h1>

<a href="{{ route('Reports.create') }}">Tambah Report Baru</a>
<br><br>

@if ($reports->isEmpty())
  <p>Tidak ada Reports</p>
@else
<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
      <th style="width: 100px">Title</th>
      <th style="width: 150px">Description</th>
      <th style="width: 100px">Start Date</th>
      <th style="width: 100px">End Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reports as $r)
    <tr>
      <td style="text-align: center">{{ $loop->iteration}}</td>
      <td>
        <a href="{{ route('Reports.show', $r) }}">
          {{ $r->title }}
        </a>
      </td>
      <td> {{ $r->description }}</td>
      <td> {{ $r->start_date }}</td>
      <td> {{ $r->end_date }}</td>
      <td style="text-align: center">
        <a href="{{ route('Reports.edit', $r) }}">Edit</a>
        <form action="{{ route('Reports.destroy', $r) }}" method="POST" style="display: inline;">
          @csrf 
          @method('DELETE')
          <button type="submit">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection