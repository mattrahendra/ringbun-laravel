<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');

        $categories = Category::all();

        // Ambil parameter sort dari URL
        $sort = $request->query('sort', 'name_asc');

        $productsQuery = Product::query();

        if ($query) {
            // Filter produk berdasarkan nama
            $productsQuery->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        // Query produk dengan sorting
        $products = Product::with('category');
        switch ($sort) {
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $products = $products->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $products = $products->orderBy('name', 'desc');
                break;
            default:
                $products = $products->orderBy('name', 'asc');
                break;
        }

        $products = $products->get();

        return view('product.index', compact('categories', 'products', 'sort', 'query'));
    }
}
