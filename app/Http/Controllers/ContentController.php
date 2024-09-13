<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::where('status', 'Active')->where('parent_id', '!=', 0)->pluck('name', 'id')->toArray();
        return view('content.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'story' => 'required',
            'category' => 'required',
        ]);

        $title = $request->title;
        $story = $request->story;
        $categoryId = $request->category;

        if($request->file('file')) {
            $file = $request->file;
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $path = public_path('content/files');

            $file->move($path, $fileName);

            $content = Content::insert([
                'title' => $title,
                'story' => $story,
                'fk_category_id' => $categoryId,
                'image' => $fileName,
                'created_at' => now()
            ]);

            return back()->with('success', 'Content created successful!');

        }

        return back()->withErrors([]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
