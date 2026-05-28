<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = category::all();

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:category',
            'nameK' => 'required|string|max:150',
            'status' => 'required|in:ready, empty',
            'date' => 'required|date',
            'description' => 'required|string|max:404',
        ]);

        category::create(
            $request->only('id', 'nameK', 'status', 'date','description')
        );

        return redirect()->route('category.index')
                         ->with('success', 'Category created successfully.');
    }

    public function show(category $category)
    {
        return view ('category.show', compact('category'));
    }

    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'id' => 'required|unique:category',
            'nameK' => 'required|string|max:150',
            'status' => 'required|in:ready, empty',
            'date' => 'required|date',
            'description' => 'required|string|max:404',
        ]);

        $category->update(
            $request->only('id', 'nameK', 'status', 'date', 'description')
        );

        return redirect()->route('category.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
                         ->with('Success', 'Category deleted successfully.');
    }
}
