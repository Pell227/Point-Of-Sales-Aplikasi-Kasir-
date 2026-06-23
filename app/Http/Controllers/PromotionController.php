<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();

        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'promo_name' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'min_purchase' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Promotion::create($request->all());

        return redirect()->route('promotions.index')
                         ->with('success', 'Promo berhasil ditambahkan');
    }

    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'promo_name'     => 'required',
            'discount_type'  => 'required',
            'discount_value' => 'required',
            'min_purchase'   => 'required',
            'start_date'     => 'required',
            'end_date'       => 'required',
            'is_active'      => 'required',
        ]);

        $promotion->update([
            'promo_name'     => $request->promo_name,
            'discount_type'  => $request->discount_type,
            'discount_value' => $request->discount_value,
            'min_purchase'   => $request->min_purchase,
            'start_date'     => $request->start_date,
            'end_date'       => $request->end_date,
            'is_active'      => $request->is_active,
        ]);

        return redirect()
        ->route('promotions.index')
        ->with('success', 'Promo berhasil diperbarui');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->route('promotions.index')
                         ->with('success', 'Promo berhasil dihapus');
    }
}