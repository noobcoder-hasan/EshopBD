<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
        
        // Fetch all unique categories
        $categories = Product::select('category')->distinct()->pluck('category');
        
        // Filter products based on the selected category
        $products = Product::when($selectedCategory, function ($query, $selectedCategory) {
            return $query->where('category', $selectedCategory);
        })->get();
    
        return view('welcome', compact('products', 'categories', 'selectedCategory'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search products by name
        $products = Product::where('product_name', 'like', "%{$query}%")->get();

        return view('welcome', compact('products'));
    }
}
