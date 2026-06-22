<h1>Edit Promo</h1>

<form action="{{ route('promotions.update', $promotion->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Nama Promo</label>
    <br>
    <input type="text"
           name="promo_name"
           value="{{ $promotion->promo_name }}">

    <br><br>

    <label>Jenis Diskon</label>
    <br>

    <select name="discount_type">

        <option value="percentage"
            {{ $promotion->discount_type == 'percentage' ? 'selected' : '' }}>
            Persentase
        </option>

        <option value="fixed"
            {{ $promotion->discount_type == 'fixed' ? 'selected' : '' }}>
            Nominal
        </option>

    </select>

    <br><br>

    <label>Nilai Diskon</label>
    <br>

    <input type="number"
           name="discount_value"
           value="{{ $promotion->discount_value }}">

    <br><br>

    <label>Minimal Belanja</label>
    <br>

    <input type="number"
           name="minimum_purchase"
           value="{{ $promotion->minimum_purchase }}">

    <br><br>

    <label>Tanggal Mulai</label>
    <br>

    <input type="date"
           name="start_date"
           value="{{ $promotion->start_date }}">

    <br><br>

    <label>Tanggal Selesai</label>
    <br>

    <input type="date"
           name="end_date"
           value="{{ $promotion->end_date }}">

    <br><br>

    <label>Status</label>
    <br>

    <select name="is_active">

        <option value="1"
            {{ $promotion->is_active ? 'selected' : '' }}>
            Aktif
        </option>

        <option value="0"
            {{ !$promotion->is_active ? 'selected' : '' }}>
            Tidak Aktif
        </option>

    </select>

    <br><br>

    <button type="submit">
        Update
    </button>

</form>