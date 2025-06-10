<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with([
            'products' => function ($query) {
                $query->select('id', 'category_id', 'price', 'stock' , 'image', 'created_at')->orderBy('price', 'asc');
            }
        ])->get();

        $blogs = Blog::whereIn('type', ['event', 'promo'])->limit(3)->get();

        return view('index', compact('categories', 'blogs'));
    }
}
