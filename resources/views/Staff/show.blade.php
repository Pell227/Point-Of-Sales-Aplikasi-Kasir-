<h1> {{ $staff->name}} </h1>

<p>{{ $staff->NIP }}</p>
<p>{{ $staff->position }}</p>
<p>{{ $staff->email }}</p>
<p>{{ $staff->phone_number }}</p>

<a href="{{ route('Staff.index') }}">Back</a>