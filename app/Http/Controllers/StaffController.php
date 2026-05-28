<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        $staff = Staff::all();

        return view('Staff.index', compact('staff'));
    }

    public function create()
    {
        return view('Staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:staff,NIP',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'phone_number' => 'required|string|max:13',
        ]);

        Staff::create($request->only('NIP','name','position','email','phone_number'));

        return redirect()->route('Staff.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('Staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('Staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $staffId = $staff->getkey();

        $request->validate([
            'NIP' => 'required|unique:staff,NIP,' . $staffId,
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $staffId,
            'phone_number' => 'required|string|max:13',
        ]);

        $staff->update($request->only('NIP','name','position','email','phone_number'));

        return redirect()->route('Staff.index')->with('success', 'Staff updated successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('Staff.index')->with('Success', 'Staff deleted successfully');
    }
}
