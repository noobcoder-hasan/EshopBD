<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected category from the request
        $selectedCategory = $request->query('category');

        // Get all unique categories
        $categories = Product::distinct()->pluck('category')->filter();

        // Query builder for products
        $query = Product::query();

        // Apply category filter if selected
        if ($selectedCategory) {
            $query->where('category', $selectedCategory);
        }

        // Get products with pagination
        $products = $query->paginate(12);

        return view('welcome', compact('products', 'categories', 'selectedCategory'));
    }

    public function getProductImage($productId)
    {
        $product = Product::findOrFail($productId);
        
        // If no image is set, return a default image
        if (!$product->product_image || !file_exists(storage_path('app/public/' . $product->product_image))) {
            return response()->file(public_path('img/products/placeholder.png'));
        }
        
        return response()->file(storage_path('app/public/' . $product->product_image));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search products by name
        $products = Product::where('product_name', 'like', "%{$query}%")->get();

        return view('welcome', compact('products'));
    }
}
