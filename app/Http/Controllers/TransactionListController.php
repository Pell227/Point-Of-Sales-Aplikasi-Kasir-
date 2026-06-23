<?php

namespace App\Http\Controllers;

use App\Models\transactionList;
use App\Models\transactions;
use Illuminate\Http\Request;

class TransactionListController extends Controller
{

    public function index()
    {
        $transactionLists = transactionList::all();

        return view('transaction-lists.index', compact('transactionLists'));
    }

    public function show($id)
    {
        $transactionList = transactionList::findOrFail($id);

        return view('transaction-lists.show', compact('transactionList'));
    }

    public function edit($id)
    {
        $transactionList = transactionList::findOrFail($id);

        return view('transaction-lists.edit', compact('transactionList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Cashier_name' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Quantity' => 'required|integer|min:1',
            'Total' => 'required|numeric|min:0',
        ]);

        $transactionList = transactionList::findOrFail($id);

        $transactionList->update(
            $request->only('Cashier_name', 'Description', 'Quantity', 'Total')
        );

        return redirect()->route('transaction_lists.index')
                         ->with('success', 'Transaction List updated successfully.');        
    }

    public function destroy($id)
    {
        $transactionList = transactionList::findOrFail($id);

        $transactionList->delete();

        return redirect()->route('transaction_lists.index')
                         ->with('success', 'Transaction List deleted successfully.');
    }
}
