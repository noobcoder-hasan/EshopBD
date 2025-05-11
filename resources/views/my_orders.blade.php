<!-- resources/views/my_orders.blade.php -->
<x-app-layout>
    @section('header')
        <h2 class="text-xl font-bold text-gray-800">Your Orders</h2>
    @endsection

    <div class="container mx-auto p-6">
        @if($orders->isEmpty())
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <p class="text-lg text-center">You have not made any orders yet.</p>
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-auto w-full text-left">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Order ID</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Total Price</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Payment Method</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Created At</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="py-3 px-4 text-sm text-gray-800">{{ $order->id }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800">৳{{ number_format($order->total_price, 2) }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800">{{ $order->payment_method }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800">{{ $order->shipping_status }}</td>
                                <td class="py-3 px-4 text-sm text-gray-800">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td class="py-3 px-4 text-sm">
                                    <a href="{{ route('order.confirmation', $order->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">View Details</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <style>
        /* Additional CSS for styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f7fafc;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .container {
            background-color: #f9fafb;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .bg-gray-200 {
            background-color: #edf2f7;
        }

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .hover\:bg-gray-50:hover {
            background-color: #f9fafb;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .text-blue-500:hover {
            color: #2563eb;
        }
    </style>
</x-app-layout>
