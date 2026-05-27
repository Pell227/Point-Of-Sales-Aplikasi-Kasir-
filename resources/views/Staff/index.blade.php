<h1> Daftar Data Staff </h1>

<a href="{{ route('staff.create') }}">Tambah Staff Baru</a>
<br><br>

@if ($staff->isEmpty())
    <p>Data staff kosong</p>
@else
<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
      <th style="width: 50px">No</th>
      <th style="width: 150px">NIP</th>
      <th style="width: 200px">Nama</th>
      <th style="width: 200px">Posisi</th>
      <th style="width: 250px">Email</th>
      <th style="width: 150px">Nomor Telepon</th>
    </tr>
  </thead>
  <tbody>
    @foreach($staff as $s)
    <tr>
      <td style="text-align: center">{{ $loop->iteration}}</td>
      <td>
        <a href="{{ route('staff.show', $s) }}">
          {{ $s->NIP }}
        </a>
      </td>
      <td> {{ $s->nama }}</td>
      <td> {{ $s->posisi }}</td>
      <td> {{ $s->email }}</td>
      <td> {{ $s->nomor_telepon }}</td>
      <td style="text-align: center">
        <a href="{{ route('staff.edit', $s) }}">Edit</a>
        <form action="{{ route('staff.destroy', $s) }}" method="POST" style="display: inline;">
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