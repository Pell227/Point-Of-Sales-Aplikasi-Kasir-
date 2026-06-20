<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    
    public function index()
    {
        $reports = Reports:all();

        return view('Reports.index', compact('reports'));
    }

    public function create()
    {
        return view('Reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ])
    }

    /**
     * Display the specified resource.
     */
    public function show(Reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
