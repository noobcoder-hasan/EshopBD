<!-- resources/views/my_orders.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-800 leading-tight">
            Your Orders
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gradient-to-b from-[#e8edfa] to-[#f6f8fe]">
        <div class="max-w-4xl mx-auto px-4">
            @if($orders->isEmpty())
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                    <p class="text-lg text-indigo-500">You have not made any orders yet.</p>
                </div>
            @else
                <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
                    <table class="min-w-full divide-y divide-indigo-100">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Order ID</th>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Total Price</th>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Payment Method</th>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Created At</th>
                                <th class="py-3 px-4 text-xs font-semibold text-indigo-700 uppercase tracking-wider">Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-indigo-50">
                            @foreach($orders as $order)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="py-3 px-4 text-sm text-indigo-900">{{ $order->id }}</td>
                                    <td class="py-3 px-4 text-sm text-blue-700 font-semibold">৳{{ number_format($order->total_price, 2) }}</td>
                                    <td class="py-3 px-4 text-sm text-indigo-900">{{ $order->payment_method }}</td>
                                    <td class="py-3 px-4 text-sm text-indigo-900">{{ $order->shipping_status }}</td>
                                    <td class="py-3 px-4 text-sm text-indigo-900">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="py-3 px-4 text-sm">
                                        <a href="{{ route('order.confirmation', $order->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold underline">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
