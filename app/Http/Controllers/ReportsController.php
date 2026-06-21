<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    
    public function index()
    {
        $reports = Reports::all();

        return view('Reports.index', compact('reports'));
    }

    public function create()
    {
        return view('Reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Reports::create($request->only('title','description','start_date','end_date'));

        return redirect()->route('Reports.index')->with('success', 'Reports created successfully');
    }

    public function show(Reports $reports)
    {
        return view('Reports.show', compact('reports'));
    }

    public function edit(Reports $reports)
    {
        return view('Reports.edit', compact('reports'));
    }

    public function update(Request $request, Reports $reports)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $reports->update($request->only('title','description','start_date','end_date'));

        return redirect()->route('Reports.index')->with('success', 'Reports updated successfully');
    }

    public function destroy(Reports $reports)
    {
        $reports->delete();

        return redirect()->route('Reports.index')->with('Success', 'Reports deleted successfully');
    }
}
