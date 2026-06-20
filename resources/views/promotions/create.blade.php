<h1>Tambah Promo</h1>

<form action="{{ route('promotions.store') }}" method="POST">
    @csrf

    <label>Nama Promo</label><br>
    <input type="text" name="promo_name">

    <br><br>

    <label>Jenis Diskon</label><br>
    <select name="discount_type">
        <option value="percentage">Persentase</option>
        <option value="fixed">Nominal</option>
    </select>

    <br><br>

    <label>Nilai Diskon</label><br>
    <input type="number" name="discount_value">

    <br><br>

    <label>Minimal Belanja</label><br>
    <input type="number" name="minimum_purchase">

    <br><br>

    <label>Tanggal Mulai</label><br>
    <input type="date" name="start_date">

    <br><br>

    <label>Tanggal Selesai</label><br>
    <input type="date" name="end_date">

    <br><br>

    <label>Status</label><br>
    <select name="is_active">
        <option value="1">Aktif</option>
        <option value="0">Tidak Aktif</option>
    </select>

    <br><br>

    <button type="submit">
        Simpan
    </button>
</form>