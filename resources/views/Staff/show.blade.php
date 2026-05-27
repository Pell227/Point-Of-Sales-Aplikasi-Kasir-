<h1> {{ $staff->Name}} </h1>

<p>{{ $staff->NIP }}</p>
<p>{{ $staff->Posisi }}</p>
<p>{{ $staff->Email }}</p>
<p>{{ $staff->Nomor Telepon }}</p>

<a href="{{ route('staff.index') }}">Back</a>