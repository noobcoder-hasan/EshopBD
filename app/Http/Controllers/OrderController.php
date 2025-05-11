<?php

namespace App\Http\Controllers;

use App\Models\NewOrder;  // Make sure to import the model
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Ensure that cart data exists in the session
        $cart = session('cart');
        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }
    
        // Get the shipping method from session
        $shippingMethod = session('shipping_method', 'normal');
        $shippingCost = $shippingMethod === 'express' ? 150 : 80;
    
        // Calculate the total price including shipping
        $totalPrice = $this->calculateTotalPrice($cart, $shippingCost);
    
        // Apply coupon discount if available
        $couponDiscount = session('coupon_discount', 0);
        if ($couponDiscount > 0) {
            $totalPrice *= ((100 - $couponDiscount) / 100);
        }
    
        // Create the order in the `newOrders` table
        $order = NewOrder::create([
            'user_id' => auth()->user()->id,
            'total_price' => $totalPrice, // Store the total price including shipping
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'username' => $request->username,
            'status' => 'Pending',
            'shipping_method' => $shippingMethod, // Optional: if you want to keep track of the method
        ]);
    
        // Loop through the cart items and add them to the order details
        foreach ($cart as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['product_price'],
            ]);
        }
    
        // Clear the cart session after the order is placed
        session()->forget('cart');
    
        // Redirect to a success page or order confirmation page
        return redirect()->route('order.confirmation', ['order_id' => $order->id])
                         ->with('success', 'Your order has been placed successfully!');
    }
    // Calculate the total price for the cart
    private function calculateTotalPrice($cart, $shippingCost)
    {
        $total = 0;
        $total += $shippingCost;
        foreach ($cart as $item) {
            $total += $item['product_price'] * $item['quantity'];
        }
        

        return $total;
    }

    public function orderConfirmation($order_id)
    {
        // Retrieve the order from the database using the order ID
        $order = NewOrder::findOrFail($order_id);

        $orderItems = $order->orderItems->map(function ($item) {
            $product = \DB::table('products')->where('product_id', $item->product_id)->first();
            $item->product_name = $product->product_name;  // Adding product name to the item
            return $item;
        });
        

        // Return the order confirmation view, passing the order data
        return view('order.confirmation', compact('order'));
    }
    public function index()
    {
        // Retrieve orders for the logged-in user
        $orders = NewOrder::where('user_id', auth()->id())->get(); 

        // Pass orders to the view
        return view('my_orders', compact('orders'));
    }


    
}
