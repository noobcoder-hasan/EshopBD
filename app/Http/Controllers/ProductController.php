<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method to fetch all products and pass them to the view
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products data to the products view
        return view('products', compact('products'));
  
    }

    
    public function show($product_id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($product_id);
    
        // Get the image data (BLOB) from the database
        $imageData = $product->product_image;
    
        // // Return the image as a response with the appropriate content type
        // return response($imageData)
        //     ->header('Content-Type', 'image/jpeg'); // Or the appropriate mime type for your images
    
        $imageInfo = getimagesizefromstring($imageData);
        $mimeType = $imageInfo['mime'];
        
        return response($imageData)
            ->header('Content-Type', $mimeType);
    }
    
    
    public function compare()
    {
        // Get all products selected for comparison
        $compareProducts = session('compare', []);
        return view('compare.index', compact('compareProducts'));
    }

    // Add product to compare session
    public function addToCompare($productId)
    {
        $product = Product::findOrFail($productId);
    
        // Get the current comparison list from the session
        $compareProducts = session('compare', []);
    
        // Ensure the product is not already in the comparison list
        if (!in_array($productId, array_column($compareProducts, 'product_id'))) {
            // Add the product to the session
            $compareProducts[] = $product;
            session(['compare' => $compareProducts]);
        }
    
        return redirect()->route('compare.index');
    }
    
    public function removeFromCompare($product_id)
    {
        // Assuming you're storing the compare products in the session with the key 'compare'
        $compareProducts = session()->get('compare', []);
    
        // Find the product in the compare list
        $compareProducts = array_filter($compareProducts, function($product) use ($product_id) {
            return $product->product_id != $product_id; // Use correct property for comparison
        });
    
        // Reindex the array to fix the keys
        $compareProducts = array_values($compareProducts);
    
        // Update the session with the new compare products
        session()->put('compare', $compareProducts);
    
        // Return a success response to be handled by JavaScript
        return response()->json(['success' => true]);
    }
    
    
    

}
