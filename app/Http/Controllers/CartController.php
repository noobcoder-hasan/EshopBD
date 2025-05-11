<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Function to display the cart
    public function showCart()
    {
        $cart = Session::get('cart', []);
        
        // Get the shipping method from session (if available)
        $shippingMethod = session('shipping_method', 'normal');
        $shippingCost = $shippingMethod === 'express' ? 150 : 80;  // Express adds 150tk, Normal adds 80tk

        // Calculate the total price including shipping
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['product_price'] * $item['quantity'];
        }
        
        // Add the shipping cost
        $totalPrice += $shippingCost;

        // Apply coupon discount if available
        $couponDiscount = session('coupon_discount', 0);
        if ($couponDiscount > 0) {
            $totalPrice *= ((100 - $couponDiscount) / 100);
        }

        $availableCoupons = \DB::table('coupons')
        ->where('valid_from', '<=', now())
        ->where('valid_until', '>=', now())
        ->get();

        return view('cart', [
            'totalPrice' => $totalPrice,
            'shippingMethod' => $shippingMethod,
            'couponDiscount' => $couponDiscount,
            'availableCoupons' => $availableCoupons,
        ]);
    }
    // Function to apply a coupon
    public function applyCoupon(Request $request)
    {
        $coupon = \DB::table('coupons')
                     ->where('code', $request->coupon_code)
                     ->where('valid_from', '<=', now())
                     ->where('valid_until', '>=', now())
                     ->first();
    
        if ($coupon) {
            session(['coupon_discount' => $coupon->discount_percentage]);
            session(['coupon_code' => $coupon->code]);
            return redirect()->route('cart.show')->with('success', 'Coupon applied successfully!');
        }
    
        return redirect()->route('cart.show')->with('error', 'Invalid or expired coupon.');
    }

    // Function to update the cart (e.g., add, remove products)
    public function addToCart(Request $request, $productId)
    {
        // Retrieve product from the database
        $product = \DB::table('products')->where('product_id', $productId)->first();

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }

        // Get the cart from the session or create a new one
        $cart = session('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1; // Increment the quantity
        } else {
            $cart[$productId] = [
                'product_id' => $product->product_id,
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'quantity' => 1,
            ];
        }

        // Save the updated cart in the session
        session(['cart' => $cart]);

        return response()->json(['success' => true, 'message' => 'Product added to cart.']);
    }

    // Function to remove a product from the cart
    public function remove($id)
    {
        // Retrieve the current cart from the session
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart and remove it
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Update the session with the modified cart
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }

    // Function to update the quantity of a product in the cart
    public function updateCart(Request $request, $product_id)
    {
        $cart = session('cart', []);

        foreach ($cart as &$item) {
            if ($item['product_id'] == $product_id) {
                if ($request->action == 'increase') {
                    $item['quantity']++;
                } elseif ($request->action == 'decrease' && $item['quantity'] > 1) {
                    $item['quantity']--;
                }
                break;
            }
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.show');
    }

    // Function to update the shipping method
    public function updateShippingMethod(Request $request)
    {
        $validated = $request->validate([
            'shipping_method' => 'required|string|in:normal,express',
        ]);

        // Store the selected shipping method in session
        session(['shipping_method' => $validated['shipping_method']]);

        return redirect()->route('cart.show');
    }

    // Function to checkout and place the order
    public function checkout(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string', // Ensure a payment method is selected
        ]);
    
        // Get the cart from session
        $cart = session('cart', []);
    
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }
    
        // Calculate the total price
        $totalPrice = 0;
        $productIds = [];
        foreach ($cart as $item) {
            $totalPrice += $item['product_price'] * $item['quantity'];
            $productIds[] = $item['product_id']; // Collect all product IDs
        }
        
        // Get the shipping method from session (if available)
        $shippingMethod = session('shipping_method', 'normal');
        $shippingCost = $shippingMethod === 'express' ? 150 : 80;  // Add shipping cost

        // Add the shipping cost to the total price
        $totalPrice += $shippingCost;
    
        // Create a new order in the 'newOrders' table
        $order = \DB::table('newOrders')->insertGetId([
            'username' => $validated['username'],
            'address' => $validated['address'],
            'shipping_status' => 'pending', // Default shipping status
            'product_ids' => implode(',', $productIds), // Store product IDs as a comma-separated string
            'total_price' => $totalPrice,
            'payment_method' => $validated['payment_method'], // Store selected payment method
            'shipping_method' => $shippingMethod, // Store selected shipping method
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Clear the cart from the session
        session()->forget('cart');
    
        // Redirect to a confirmation page or show a success message
        return redirect()->route('cart.show')->with('success', 'Your order has been placed successfully.');
    }
    

}
