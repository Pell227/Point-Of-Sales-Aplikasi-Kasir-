<h1>Ubah Data Staff</h1>
<form method="POST" action="{{ route('Staff.update', $staff) }}">
  @csrf
  @method('PUT')
  NIP:
  <br>
  <input name="NIP" value="{{ $staff->NIP }}" required>
  <br>
  <br>
  Nama:
  <br>
  <textarea name="name" rows="8" required>{{ $staff->name }}</textarea>
  <br>
  <br>
  Posisi:
  <br>
  <textarea name="position" rows="8" required>{{ $staff->position }}</textarea>
  <br>
  <br>
  Email:
  <br>
  <textarea name="email" rows="8" required>{{ $staff->email }}</textarea>
  <br>
  <br>
  Nomor Telepon:
  <br>
  <textarea name="phone_number" rows="8" required>{{ $staff->phone_number }}</textarea>
  <br>
  <br>
  <button type="submit">Save</button>
</form>