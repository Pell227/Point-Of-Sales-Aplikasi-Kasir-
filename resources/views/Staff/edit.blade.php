<h1>Ubah Data Staff</h1>
<form method="POST" action="{{ route('staff.update', $staff) }}">
  @csrf
  @method('PUT')
  NIP:
  <br>
  <input name="NIP" value="{{ $staff->NIP }}" required>
  <br>
  <br>
  Nama:
  <br>
  <textarea name="Name:" rows="8" required></textarea>
  <br>
  <br>
  Posisi:
  <br>
  <textarea name="Posisi:" rows="8" required></textarea>
  <br>
  <br>
  Email:
  <br>
  <textarea name="Email:" rows="8" required></textarea>
  <br>
  <br>
  Nomor Telepon:
  <br>
  <textarea name="Nomor Telepon:" rows="8" required></textarea>
  <br>
  <br>
  <button type="submit">Save</button>
</form>