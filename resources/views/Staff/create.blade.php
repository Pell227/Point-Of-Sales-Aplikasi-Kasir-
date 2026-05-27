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
  <textarea name="name" rows="8" required></textarea>
  <br>
  <br>
  Posisi:
  <br>
  <textarea name="position" rows="8" required></textarea>
  <br>
  <br>
  Email:
  <br>
  <textarea name="email" rows="8" required></textarea>
  <br>
  <br>
  Nomor Telepon:
  <br>
  <textarea name="phone_number" rows="8" required></textarea>
  <br>
  <br>
  <button type="submit">Save</button>
  <a href="{{ route('Staff.index') }}"> <button type="submit">Back</button></a>
</form>