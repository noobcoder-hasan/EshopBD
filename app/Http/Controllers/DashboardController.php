<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;      

use App\Models\Product;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
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

        return view('dashboard', compact('products', 'categories', 'selectedCategory'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('product_name', 'like', '%' . $query . '%')->get();
        $categories = Product::distinct()->pluck('category');
        $selectedCategory = null;

        return view('dashboard', compact('products', 'categories', 'selectedCategory'));
    }

}
