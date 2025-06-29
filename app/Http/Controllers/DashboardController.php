<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;       // ✅ CORRECT

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
    // public function index(Request $request)
    // {
    //     $query = Product::query();
    
    //     // Apply search filter
    //     if ($request->has('search') && $request->search) {
    //         $query->where('product_name', 'like', '%' . $request->search . '%');
    //     }
    
    //     // Apply brand filter
    //     if ($request->has('brand') && $request->brand) {
    //         $query->where('brand', $request->brand);
    //     }
    
    //     // Get the filtered products
    //     $products = $query->get();
    
    //     return view('dashboard', compact('products'));
    // }
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

        return view('dashboard', compact('products', 'categories', 'selectedCategory'));
    }
}
