<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:staff',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:staff',
            'phone_number' => 'required|integer',
        ]);

        Staff::create($request->only('NIP','name','position','email','phone_number'));

        return redirect()->route('staff.index')->with('Success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'NIP' => 'required|unique:staff',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:staff',
            'phone_number' => 'required|integer',
        ]);

        $staff->update($request->only('NIP','name','position','email','phone_number'));

        return redirect()->route('staff.index')->with('Success', 'Staff updated successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('Success', 'Staff deleted successfully');
    }
}
