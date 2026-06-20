<h1>Daftar Promo</h1>

<a href="{{ route('promotions.create') }}">
    Tambah Promo
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nama Promo</th>
        <th>Tipe Diskon</th>
        <th>Nilai Diskon</th>
        <th>Minimal Belanja</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($promotions as $promo)

    <tr>

        <td>{{ $promo->id }}</td>
        <td>{{ $promo->promo_name }}</td>
        <td>{{ $promo->discount_type }}</td>
        <td>{{ $promo->discount_value }}</td>
        <td>{{ $promo->minimum_purchase }}</td>

        <td>{{ $promo->start_date }}</td>
        <td>{{ $promo->end_date }}</td>

        <td>
            {{ $promo->is_active ? 'Aktif' : 'Tidak Aktif' }}
        </td>

        <td>

            <a href="{{ route('promotions.show', $promo->id) }}">
                Detail
            </a>

            |

            <a href="{{ route('promotions.edit', $promo->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('promotions.destroy', $promo->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>