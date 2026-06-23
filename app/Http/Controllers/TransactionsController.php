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
            'nameTransaction' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'tax' => 'required|numeric',
            'statustrans' => 'required|in:pending,paid,canceled',
            'datetrans' => 'required|date',
        ]);

        $data = $request->only('nameTransaction', 'amount', 'tax', 'statustrans', 'datetrans');
        $data['Transactionid'] = 'TRX-' . strtoupper(uniqid());

        $newTransaction = transactions::create($data);
          
        return redirect()->route('transactions.create')
                         ->with('success', 'Transaction created successfully.')
                         ->with('created_transaction', $newTransaction->toArray());
    }

    public function show($id)
    {
        $transactions = transactions::find($id);
        return view('transactions.show', compact('transactions'));
    }

    public function edit($id)
    {
        $transactions = transactions::find($id);
        return view('transactions.edit', compact('transactions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nameTransaction' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'tax' => 'required|numeric',
            'statustrans' => 'required|in:pending,paid,canceled',
        ]);

        $transactions = transactions::find($id);

        $transactions->update(
            $request->only('nameTransaction', 'amount', 'tax', 'statustrans')
        );

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transactions = transactions::find($id);
        $transactions->delete();

        return redirect()->route('transactions.index')
                         ->with('Success', 'transaction deleted successfully.');
    }
}
