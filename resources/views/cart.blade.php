<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-blue-300 to-indigo-200 flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-3xl">
            @if (session('cart') && count(session('cart')) > 0)
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Shopping Cart</h3>
                    <div class="divide-y divide-gray-200">
                        @foreach (session('cart') as $item)
                            <div class="flex flex-col md:flex-row md:items-center justify-between py-6">
                                <div class="flex-1">
                                    <p class="font-semibold text-lg text-gray-700">{{ $item['product_name'] ?? 'N/A' }}</p>
                                    <p class="text-gray-500">Price: <span class="font-medium text-blue-700">৳{{ $item['product_price'] ?? 0 }}</span></p>
                                    <div class="flex items-center mt-2">
                                        <form action="{{ route('cart.update', ['product_id' => $item['product_id']]) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="action" value="decrease" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 text-lg font-bold">-</button>
                                            <input type="text" class="w-14 text-center border border-gray-300 rounded bg-gray-50" name="quantity" value="{{ $item['quantity'] ?? 0 }}" readonly>
                                            <button type="submit" name="action" value="increase" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 text-lg font-bold">+</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-4 md:mt-0 md:ml-6">
                                    <a href="{{ route('cart.remove', ['product_id' => $item['product_id']]) }}" class="inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Remove</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-right text-xl font-semibold text-gray-700 mt-6">
                        Total Price: <span class="text-blue-700">৳{{ number_format($totalPrice, 2) }}</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Select Shipping Method</h3>
                    <form action="{{ route('cart.updateShippingMethod') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="shipping_method" class="block text-sm font-medium text-gray-700 mb-1">Choose Shipping Method:</label>
                            <select name="shipping_method" id="shipping_method" class="w-full px-4 py-2 border border-gray-300 rounded focus:border-blue-500 focus:ring-2 focus:ring-blue-100 bg-gray-50">
                                <option value="normal" {{ $shippingMethod == 'normal' ? 'selected' : '' }}>Normal (80 Taka)</option>
                                <option value="express" {{ $shippingMethod == 'express' ? 'selected' : '' }}>Express (150 Taka)</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow hover:bg-blue-700 transition">Update Shipping</button>
                    </form>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Available Coupons</h3>
                    <ul class="space-y-2">
                        @forelse ($availableCoupons as $coupon)
                            <li>
                                <form method="POST" action="{{ route('cart.applyCoupon', ['coupon_code' => $coupon->code]) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-blue-600 hover:underline font-semibold">{{ $coupon->code }}</button>
                                </form>
                            </li>
                        @empty
                            <li class="text-gray-500">No coupons available at the moment.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Checkout</h3>
                    <form action="{{ route('order.place') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required></textarea>
                        </div>
                        @if(session('coupon_discount'))
                            <p class="text-green-600 font-semibold">Coupon Discount: {{ session('coupon_discount') }}%</p>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                            <div class="flex items-center space-x-4 mt-2">
                                <input type="radio" id="payment_method_cod" name="payment_method" value="cash_on_delivery" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="payment_method_cod" class="text-gray-700">Cash on Delivery</label>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-indigo-700 transition">Place Order</button>
                    </form>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-lg p-12 text-center text-2xl text-gray-400 font-semibold">
                    Your cart is currently empty.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
