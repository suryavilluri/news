<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Content;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data['news'] = Content::all();
        $data['path'] = url('public/content/files/');
        return view('news.index')->with($data);
    }
}
