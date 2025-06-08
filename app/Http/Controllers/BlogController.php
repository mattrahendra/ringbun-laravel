<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $article = Blog::where('id', '!=', $blog->id)
            ->where('status', 'published')
            ->latest()
            ->take(3) // Fetch 3 latest articles excluding the current one
            ->get();

        return view('blog.show', compact('blog', 'article'));
    }
}
