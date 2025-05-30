<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('blog.index', compact('blogs'));
    }

    public function show($id) {
        $blog = Blog::where('status', 'published')->findOrFail($id);

        return view('blog.show', compact('blog'));
    }
}
