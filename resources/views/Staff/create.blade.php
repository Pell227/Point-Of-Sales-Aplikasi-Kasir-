<h1>Buat data staff baru</h1>
<form method="POST" action="{{ route('Staff.store') }}">
  @csrf
  NIP:
  <br>
  <input name="NIP" required>
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