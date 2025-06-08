<?php

namespace App\Http\Controllers;

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
        return view('index', compact('categories'));
    }
}
