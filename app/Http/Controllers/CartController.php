<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\PaymentMethod;
use App\Models\transactions;
use App\Models\transactionList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('POS.index', compact('products', 'categories'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back();
    }

    public function checkout() {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('pos.index')->with('error', 'Cart masih kosong');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $promotions = Promotion::where('is_active', true)
           ->where('start_date', '<=', Carbon::today())
           ->where('end_date', '>=', Carbon::today())
           ->where('min_purchase', '<=', $total)
           ->get();

        $paymentMethods = PaymentMethod::all();

        return view('POS.checkout', compact('cart', 'total', 'promotions', 'paymentMethods'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'cashier_name'      => 'required|string',
            'payment_method_id' => 'required',
            'cash_given'        => 'required|numeric|min:0',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('pos.index')->with('error','None');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $discount = 0;
        if ($request->promotion_id) {
            $promo = Promotion::find($request->promotion_id);
            if ($promo) {
                $discount = $promo->discount_type === 'percentage'
                 ? $subtotal * ($promo->discount_value/100)
                 : $promo->discount_value;
            }
        }

        $tax = (int) round($subtotal * 0.11);
        $total = (int) round($subtotal - $discount + $tax);

        $transactionId = 'TRX-' . strtoupper(Str::random(8));

        transactions::create([
            'Transactionid'   => $transactionId,
            'nameTransaction' => 'POS-' . Carbon::now()->format('dmY-His'),
            'amount'          => $total,
            'tax'             => $tax,
            'statustrans'     => 'Paid',
            'datetrans'       => Carbon::today(),
        ]);

        foreach ($cart as $productId => $item) {
            transactionList::create([
                'Transactionid' => $transactionId,
                'Receiptid'     => 'RCP-' . strtoupper(Str::random(6)),
                'Cashier_name'  => $request->cashier_name,
                'Description'   => $item['name'],
                'Quantity'      => $item['quantity'],
                'Total'         => $item['price'] * $item['quantity'],
            ]);
        }
        
        session()->forget('cart');

        return redirect()->route('transaction_lists.index')
            ->with('success', "Transaksi $transactionId berhasil disimpan!");
    }
}