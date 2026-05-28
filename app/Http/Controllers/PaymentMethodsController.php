<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'payment_type' => 'nullable',
            'payment_category' => 'nullable',
            'provider' => 'nullable'
        ]);

        PaymentMethod::create([
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type,
            'payment_category' => $request->payment_category,
            'provider' => $request->provider
        ]);

        return redirect()->route('paymentMethods.index')
                         ->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'payment_method' => 'required',
            'payment_type' => 'nullable',
            'payment_category' => 'nullable',
            'provider' => 'nullable'
        ]);

        $paymentMethod->update([
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type,
            'payment_category' => $request->payment_category,
            'provider' => $request->provider
        ]);

        return redirect()->route('paymentMethods.index')
                         ->with('success', 'Metode pembayaran berhasil diupdate');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('paymentMethods.index')
                         ->with('success', 'Metode pembayaran berhasil dihapus');
    }
}