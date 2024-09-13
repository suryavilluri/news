<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::where('status', 'Active')->where('parent_id', '!=', 0)->get();
        return view('category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory' => 'required',
        ]);

        $parentId = $request->category;
        $category = $request->subcategory;
        $status = $request->status;

        Category::insert([
            'name' => $category,
            'parent_id' => $parentId,
            'status' => $status,
            'created_at' => now()
        ]);

        return back()->with('success', 'Category created successful!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $data['categories'] = Category::where('status', 'Active')->pluck('name', 'id')->toArray();
        return view('category.create')->with($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
