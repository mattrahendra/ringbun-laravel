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

        // Load semua kategori
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 'available');
        }])->get();

        // Load semua produk tanpa filter kategori (untuk client-side filtering)
        $productsQuery = Product::with('category')
            ->where('status', 'available');

        // Hanya apply search filter di server-side
        if ($query) {
            $productsQuery->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
            });
        }

        // Sorting tetap di server-side
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

        return view('product.index', compact('products', 'categories', 'query', 'sort'));
    }

    public function getProducts(Request $request)
    {
        $query = $request->query('q');
        $sort = $request->query('sort', 'name_asc');
        $categoryId = $request->query('category');

        $productsQuery = Product::with('category')
            ->where('status', 'available');

        if ($categoryId && $categoryId !== 'all') {
            $productsQuery->where('category_id', $categoryId);
        }

        if ($query) {
            $productsQuery->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
            });
        }

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

        return response()->json($products);
    }

    public function cart()
    {
        return view('product.cart');
    }
}
