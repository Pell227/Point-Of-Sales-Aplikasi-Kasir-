<h1> {{$reports->title}} </h1>

<p>{{ $reports->description }}</p>
<p>{{ $reports->start_date }}</p>
<p>{{ $reports->end_date }}</p>

<a href="{{ route('Reports.index') }}">Back</a>