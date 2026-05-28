<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    public function index()
    {
        $transactions = transactions::all();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:transactions',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'tax' => 'required|numeric',
            'status' => 'required|in:pending,paid,completed',
            'date' => 'required|date',
        ]);

        transactions::create(
            $request->only('id', 'name', 'amount', 'tax', 'status', 'date')
        );

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction created successfully.');
    }

    public function show(transactions $transactions)
    {
        return view('transactions.show', compact('transactions'));
    }

    public function edit(transactions $transactions)
    {
        return view('transactions.edit', compact('transactions'));
    }

    public function update(Request $request, transactions $transactions)
    {
        $request->validate([
            'id' => 'required|unique:transactions',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'tax' => 'required|numeric',
            'status' => 'required|in:pending,paid,completed',
            'date' => 'required|date',
        ]);

        $transactions->update(
            $request->only('id', 'name', 'amount', 'tax', 'status', 'date')
        );

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction updated successfully.');
    }

    public function destroy(transactions $transactions)
    {
        $transactions->delete();

        return redirect()->route('transactions.index')
                         ->with('Success', 'transaction deleted successfully.');
    }
}
