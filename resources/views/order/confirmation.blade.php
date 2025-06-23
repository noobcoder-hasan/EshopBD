<!-- resources/views/order/confirmation.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0e7ff 0%, #f4f7fc 100%);
            color: #333;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            padding: 40px 28px 32px 28px;
            box-shadow: 0 8px 32px rgba(99,102,241,0.10);
            border-radius: 22px;
            margin-top: 60px;
            margin-bottom: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #3730a3;
            font-size: 2.1em;
            font-weight: 700;
            margin-bottom: 18px;
            letter-spacing: 0.01em;
        }
        .icon-success {
            color: #22c55e;
            font-size: 2.5rem;
            margin-bottom: 18px;
        }
        p {
            font-size: 1.13em;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 10px;
        }
        .order-info {
            margin-bottom: 22px;
            width: 100%;
        }
        .order-info p {
            margin-bottom: 8px;
            font-size: 1.05em;
        }
        .order-info strong {
            color: #6366f1;
        }
        .order-items {
            width: 100%;
            margin-bottom: 24px;
        }
        .order-items h3 {
            color: #2563eb;
            font-size: 1.15em;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .order-items ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        .order-items li {
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .order-items li:last-child {
            border-bottom: none;
        }
        .order-items i {
            color: #6366f1;
            font-size: 1.1em;
        }
        .button-group {
            display: flex;
            gap: 18px;
            margin-top: 32px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 1.13em;
            font-weight: 600;
            border-radius: 9px;
            border: none;
            outline: none;
            box-shadow: 0 2px 8px rgba(99,102,241,0.08);
            transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
            cursor: pointer;
        }
        .button:hover, .button:focus {
            background: linear-gradient(135deg, #3730a3 0%, #6366f1 100%);
            box-shadow: 0 4px 16px rgba(99,102,241,0.18);
            transform: translateY(-2px) scale(1.04);
        }
        @media (max-width: 600px) {
            .container {
                padding: 18px 4vw 18px 4vw;
                margin-top: 24px;
                margin-bottom: 24px;
            }
            .button-group {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="icon-success"><i class="fas fa-check-circle"></i></span>
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
            <h3><i class="fas fa-box"></i> Order Items:</h3>
            <ul>
                @foreach($order->orderItems as $item)
                    <li><i class="fas fa-cube"></i> {{ $item->product_name }} <span class="text-gray-400">(x{{ $item->quantity }})</span> - <span class="text-indigo-600">৳{{ $item->price }}</span></li>
                @endforeach
            </ul>
        </div>
        <!-- Dashboard & Orders Buttons -->
        <div class="button-group">
            <a href="{{ route('dashboard') }}" class="button"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('my.orders') }}" class="button"><i class="fas fa-box"></i> My Orders</a>
        </div>
    </div>
</body>
</html>
