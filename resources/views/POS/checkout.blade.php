@extends('layouts.main')

@section('title', 'checkout')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-2xl font-bold mb-6">Konfirmasi Checkout</h1>

  <div class="bg-white rounded-xl shadow p-5 mb-5">
    <h2 class="font-bold text-lg mb-3 border-b pb-2">Rincian Pesanan</h2>

    @php $subtotal = 0; @endphp

    @foreach($cart as $id => $item)
      @php 
         $sub = $item['price'] * $item['quantity'];
         $subtotal += $sub;
      @endphp
      <div class="flex justify-between py-2 border-b last:border-0">
        <div>
          <span class="font-medium">{{ $item['name'] }}</span>
          <span class="text-gray-400 text-sm ml-2">x{{ $item['quantity'] }}</span>
        </div>
        <span>Rp {{ number_format($sub) }}</span>
      </div>
    @endforeach

    <div class="flex justify-between mt-3 text-gray-500 text-sm">
      <span>Subtotal</span>
      <span>Rp {{ number_format($subtotal) }}</span>
    </div>
    <div class="flex justify-between text-gray-500 text-sm">
      <span>Subtotal</span>
      <span>Rp {{ number_format($subtotal) }}</span>
    </div>
    <div class="flex justify-between text-gray-500 text-sm">
      <span>PPN (11%)</span>
      <span id="tax-display">Rp {{ number_format(round($subtotal * 0.11)) }}</span>
    </div>
    <div class="flex justify-between text-gray-500 text-sm text-green-600">
      <span>Diskon</span>
      <span id="discount-display">- RP 0</span>
    </div>
    <div class="flex justify-between font-bold text-lg mt-2">
      <span>Total</span>
      <span id="total-display"Rp {{ number_format($total + round($total * 0.11)) }}</span>
    </div>
  </div>

  <form action="{{ route('checkout.process') }}" method="POST">
    @csrf

    <div class="bg-white rounded-xl shadow p-5 mb-5">
      <label class="block font-semibold mb-1">Nama Kasir</label>
      <input type="text" name="cashier_name" value="{{ old('cashier_name') }}" class="w-full bordder rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
      placeholder="Maukkan nama kasir" required>
    @error('cashier_name')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    </div>
    <div class="bg-white rounded-xl shadow p-5 mb-5">
      <h2 class="font-bold text-lg mb-3">Promo</h2>

      @if($promotions->isEmpty())
        <p class="text-gray-400 text-sm">Tidak ada promo yang tersedia</p>
        <input type="hidden" name="promotion_id" value="">
      @else
        <div class="space-y-2">
          <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
            <input type="radio" name="promotion_id" value="" checked class="promo-radio" onchange="updateTotal()">
          <div>
            <span class="font-medium">Tanpa Promo</span>
          </div>
        </label>

        @foreach($promotions as $promo)
        <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-blue-50 border-blue-200">
          <input type="radio" name="promotion_id" value="{{ $promo->id }}" class="promo-radio" data-type="{{ $promo->discount_type }}" data-value="{{ $promo->discount_value }}" onchange="updateTotal()">
        <div>
          <span class="font-medium text-blue-700">{{ $promo->promo_name }}</span>
          <p class="text-sm text-gray-500"> Diskon
            @if($promo->discount_type === 'percentage')
              {{ $promo->discount_value }}%
            @else
              Rp {{ number_format($promo->discount_value) }}
            @endif
             Min Rp {{ number_format($promo->min_purchase) }}
             s/d {{ \Carbon\Carbon::parse($promo->end_date)->format('d M Y') }}
            </p>
        </div>
      </label>
      @endforeach
      </div>
    @endif
  </div>
  <div class="bg-white rounded-xl shadow p-5 mb-5">
            <h2 class="font-bold text-lg mb-3">Metode Pembayaran</h2>
            <select name="payment_method_id" required
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Pilih Metode --</option>
                @foreach($paymentMethods as $method)
                    <option value="{{ $method->id }}">{{ $method->payment_method }}</option>
                @endforeach
            </select>
            @error('payment_method_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input Uang Bayar --}}
        <div class="bg-white rounded-xl shadow p-5 mb-5">
            <h2 class="font-bold text-lg mb-3">Uang Bayar</h2>
            <input type="number" name="cash_given" id="cash_given"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                   placeholder="Masukkan nominal uang" min="0" oninput="updateKembalian()" required>
            @error('cash_given')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="mt-3 flex justify-between font-semibold text-lg">
                <span>Kembalian</span>
                <span id="kembalian-display" class="text-green-600">Rp 0</span>
            </div>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('pos.index') }}"
               class="flex-1 text-center border border-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-100 transition">
                Kembali
            </a>
            <button type="submit"
                    class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-bold transition">
                Bayar & Simpan
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    const subtotal = {{ $subtotal }};
    const taxRate  = 0.11;
    let   finalTotal = subtotal + Math.round(subtotal * taxRate);

    function updateTotal() {
        const selected = document.querySelector('.promo-radio:checked');
        const type  = selected?.dataset.type  || null;
        const value = parseFloat(selected?.dataset.value || 0);

        let discount = 0;
        if (type === 'percentage') {
            discount = subtotal * (value / 100);
        } else if (type === 'fixed') {
            discount = value;
        }

        const tax   = Math.round(subtotal * taxRate);
        finalTotal  = Math.round(subtotal - discount + tax);

        document.getElementById('discount-display').textContent =
            '- Rp ' + discount.toLocaleString('id-ID');
        document.getElementById('tax-display').textContent =
            'Rp ' + tax.toLocaleString('id-ID');
        document.getElementById('total-display').textContent =
            'Rp ' + finalTotal.toLocaleString('id-ID');

        updateKembalian();
    }

    function updateKembalian() {
        const bayar     = parseFloat(document.getElementById('cash_given').value || 0);
        const kembalian = bayar - finalTotal;
        const el        = document.getElementById('kembalian-display');

        el.textContent = 'Rp ' + Math.max(0, kembalian).toLocaleString('id-ID');
        el.className   = kembalian < 0
            ? 'text-red-500'
            : 'text-green-600';
    }
</script>
@endpush

@endsection
