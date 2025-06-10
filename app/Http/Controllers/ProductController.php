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
        $sort = $request->query('sort', 'name_asc');
        $categoryParam = $request->get('category'); // Bisa ID atau slug

        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 'available');
        }])->get();

        $productsQuery = Product::with('category')
            ->where('status', 'available');

        if ($categoryParam) {
            // Cek apakah parameter adalah ID (numeric) atau slug (string)
            if (is_numeric($categoryParam)) {
                $productsQuery->where('category_id', $categoryParam);
            } else {
                // Cari berdasarkan slug kategori
                $category = Category::where('slug', $categoryParam)->first();
                if ($category) {
                    $productsQuery->where('category_id', $category->id);
                }
            }
        }

        if ($query) {
            $productsQuery->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
            });
        }

        // Sorting
        switch ($sort) {
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            default:
                $productsQuery->orderBy('name', 'asc');
        }

        $products = $productsQuery->get();

        return view('product.index', compact('products', 'categories', 'query', 'sort', 'categoryParam'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('status', 'available')
            ->orderBy('name', 'asc')
            ->get();

        $categories = Category::with(['products' => function($query) {
            $query->where('status', 'available');
        }])->get();

        return view('product.index', compact('products', 'categories', 'category'))
            ->with('query', null)
            ->with('sort', 'name_asc')
            ->with('categoryParam', $slug);
    }

    public function categoryById($id)
    {
        $category = Category::findOrFail($id);

        // Redirect ke route dengan slug untuk SEO-friendly URL
        return redirect()->route('products.category', ['slug' => $category->slug]);
    }

    public function cart()
    {
        return view('product.cart');
    }
}
