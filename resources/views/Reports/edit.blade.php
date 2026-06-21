<h1>Ubah Data Reports</h1>
<form method="POST" action="{{ route('Reports.update', $reports) }}">
  @csrf
  @method('PUT')

  <label>Title:</label><br>
  <input type="text" name="title" value="{{ old('title') }}" required><br><br>

  <label>Description:</label><br>
  <input type="text" name="description" value="{{ old('description') }}" required><br><br>

  <label>Start Date:</label><br>
  <input type="date" name="start_date" value="{{ old('start_date') }}" required><br><br>

  <label>End Date:</label>
  <input type="date" name="end_date" value="{{ old('end_date') }}" required><br><br>

  <button type="submit">Save</button>
  <a href="{{ route('Reports.index') }}"><button type="button">Cancel</button></a>
</form>