<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <style>
        /* General Cart Container */
        .cart-container {
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-header {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        /* Cart Items */
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .product-details {
            flex: 1;
            font-size: 1rem;
        }

        .product-details p {
            margin: 5px 0;
        }

        /* Quantity Control */
        .quantity-btns {
            display: flex;
            align-items: center;
        }

        .quantity-btns button {
            padding: 5px 12px;
            font-size: 1.25rem;
            margin: 0 5px;
            border: none;
            background-color: #ddd;
            cursor: pointer;
            border-radius: 5px;
        }

        .quantity-btns button:hover {
            background-color: #bbb;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            font-size: 1.25rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0 5px;
        }

        /* Cart Action Buttons */
        .cart-actions .btn {
            padding: 10px 15px;
            background-color: #3f51b5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cart-actions .btn:hover {
            background-color: #303f9f;
        }

        /* Cart Total */
        .cart-total {
            text-align: right;
            font-size: 1.25rem;
            margin-top: 20px;
        }

        /* Shipping and Checkout Forms */
        .checkout-form {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .checkout-form h3 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #3f51b5;
            outline: none;
        }

        .checkout-form button {
            width: 100%;
            padding: 12px;
            background-color: #3f51b5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-form button:hover {
            background-color: #303f9f;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 50px;
        }

        .available-coupons ul {
            padding-left: 20px;
        }

        .available-coupons li {
            margin-bottom: 10px;
        }

        .available-coupons button {
            background: none;
            border: none;
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-actions {
                text-align: left;
                margin-top: 10px;
            }

            .checkout-form button {
                font-size: 1.1rem;
            }
        }
    </style>

    <div class="cart-container">
        @if (session('cart') && count(session('cart')) > 0)
            <div class="cart-header">Shopping Cart</div>
            
            <div>
                @foreach (session('cart') as $item)
                    <div class="cart-item">
                        <div class="product-details">
                            <p><strong>Product Name:</strong> {{ $item['product_name'] ?? 'N/A' }}</p>
                            <p><strong>Price:</strong> ৳{{ $item['product_price'] ?? 0 }}</p>
                            <div class="quantity-btns">
                                <form action="{{ route('cart.update', ['product_id' => $item['product_id']]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="action" value="decrease">-</button>
                                    <input type="text" class="quantity-input" name="quantity" value="{{ $item['quantity'] ?? 0 }}" readonly>
                                    <button type="submit" name="action" value="increase">+</button>
                                </form>
                            </div>
                        </div>
                        <div class="cart-actions">
                            <a href="{{ route('cart.remove', ['product_id' => $item['product_id']]) }}" class="btn">Remove</a>
                        </div>
                    </div>
                @endforeach

                <div class="cart-total">
                    <p><strong>Total Price: ৳{{ number_format($totalPrice, 2) }}</strong></p>
                </div>
                
                <div class="checkout-form">
                    <h3>Select Shipping Method</h3>
                    <form action="{{ route('cart.updateShippingMethod') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="shipping_method">Choose Shipping Method:</label>
                            <select name="shipping_method" id="shipping_method" class="form-control">
                                <option value="normal" {{ $shippingMethod == 'normal' ? 'selected' : '' }}>Normal (80 Taka)</option>
                                <option value="express" {{ $shippingMethod == 'express' ? 'selected' : '' }}>Express (150 Taka)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn">Update Shipping</button>
                    </form>
                </div>

                <hr>

                <div class="available-coupons">
                    <h3>Available Coupons</h3>
                    <ul>
                        @forelse ($availableCoupons as $coupon)
                            <li>
                                <form method="POST" action="{{ route('cart.applyCoupon', ['coupon_code' => $coupon->code]) }}">
                                    @csrf
                                    <button type="submit">
                                        <strong> {{ $coupon->code }} </strong>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li>No coupons available at the moment.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="checkout-form">
                    <h3>Checkout</h3>
                    <form action="{{ route('order.place') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Full Name</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" required></textarea>
                        </div>

                        @if(session('coupon_discount'))
                            <p>Coupon Discount: {{ session('coupon_discount') }}%</p>
                        @endif

                        <div class="form-group">
                            <label>Payment Method</label><br>
                            <input type="radio" id="payment_method_cod" name="payment_method" value="cash_on_delivery" required>
                            <label for="payment_method_cod" class="radio-label">Cash on Delivery</label>
                        </div>

                        <button type="submit">Place Order</button>
                    </form>
                </div>
            </div>
        @else
            <p class="empty-cart">Your cart is currently empty.</p>
        @endif
    </div>
</x-app-layout>
