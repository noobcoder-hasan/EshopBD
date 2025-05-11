<!-- resources/views/order/confirmation.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    <!-- Inline CSS for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        h1 {
            color: #2d87f0;
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            line-height: 1.6;
        }

        .order-info {
            margin-bottom: 20px;
        }

        .order-items ul {
            list-style: none;
            padding-left: 0;
        }

        .order-items li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 30px;
            background-color: #2d87f0;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #235a97;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Order Confirmation</h1>

        <p>Thank you for your order, <strong>{{ $order->username }}</strong>!</p>
        <div class="order-info">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Total Price:</strong> ৳{{ $order->total_price }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
        </div>

        <!-- Order Items -->
        <div class="order-items">
            <h3>Order Items:</h3>
            <ul>
                @foreach($order->orderItems as $item)
                    <li>{{ $item->product_name }} (x{{ $item->quantity }}) - ৳{{ $item->price }} </li>
                @endforeach
            </ul>
        </div>

        <!-- Dashboard Button -->
        <a href="{{ route('dashboard') }}" class="button">Go to Dashboard</a>
        <a href="{{ route('my.orders') }}" class="button">My order</a>
        
    </div>

</body>
</html>
