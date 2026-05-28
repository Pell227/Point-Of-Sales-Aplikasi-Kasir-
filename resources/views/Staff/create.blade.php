<h1>Buat data staff baru</h1>
<form method="POST" action="{{ route('Staff.store') }}">
  @csrf
  <label>NIP:</label><br>
  <input type="text" name="NIP" value="{{ old('NIP') }}" required><br><br>

  <label>Nama:</label><br>
  <input type="text" name="name" value="{{ old('name') }}" style="width: 300px;" required><br><br>

  <label>Posisi:</label><br>
  <input type="text" name="position" value="{{ old('position') }}" style="width: 300px;" required><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="{{ old('email') }}" style="width: 300px;" required><br><br>

  <label>Nomor Telepon:</label><br>
  <input type="text" name="phone_number" value="{{ old('phone_number') }}" required><br><br>

  <button type="submit">Save</button>
  <a href="{{ route('Staff.index') }}"><button type="button">Back</button></a>
</form>