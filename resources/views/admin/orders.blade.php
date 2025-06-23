<!-- admin/orders.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #e0e7ff 0%, #f4f7fc 100%);
            min-height: 100vh;
        }
        .sidebar {
            height: 100vh;
            width: 260px;
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 32px;
            box-shadow: 2px 0 12px rgba(99,102,241,0.08);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .sidebar .logo i {
            font-size: 2rem;
            margin-right: 0.5rem;
            color: #fff;
        }
        .sidebar .logo span {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .sidebar ul {
            list-style: none;
            padding-left: 0;
            flex: 1;
        }
        .sidebar ul li {
            margin-bottom: 8px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            font-size: 1rem;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar a i {
            margin-right: 12px;
            font-size: 1.2rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.12);
            color: #e0e7ff;
        }
        .main-content {
            margin-left: 260px;
            padding: 40px 24px 80px 24px;
            min-height: 100vh;
        }
        .content-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(99,102,241,0.10);
            padding: 32px;
            margin-bottom: 24px;
        }
        .content-card h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #3730a3;
            margin-bottom: 24px;
        }
        .table {
            margin-top: 24px;
        }
        .table thead th {
            background: #f8fafc;
            color: #4b5563;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.05em;
            padding: 16px;
            border-bottom: 2px solid #e5e7eb;
        }
        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            color: #4b5563;
            border-bottom: 1px solid #e5e7eb;
        }
        .btn-details {
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }
        .btn-details i {
            margin-right: 6px;
        }
        .btn-details:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99,102,241,0.2);
            color: #fff;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-shipped {
            background-color: #dcfce7;
            color: #166534;
        }
        .status-received {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .footer {
            position: fixed;
            left: 260px;
            right: 0;
            bottom: 0;
            background: #3730a3;
            color: #e0e7ff;
            text-align: center;
            padding: 14px 0 10px 0;
            font-size: 15px;
            letter-spacing: 0.5px;
            z-index: 200;
        }
        @media (max-width: 900px) {
            .main-content {
                margin-left: 0;
                padding: 24px 16px 80px 16px;
            }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                padding: 16px;
            }
            .footer {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo mb-4">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Admin</span>
        </div>
        <ul class="list-unstyled">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.viewUsers') }}"><i class="fa-solid fa-users"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.orders') }}" class="active"><i class="fa-solid fa-box"></i>Orders</a></li>
            <li><a href="{{ route('admin.discounts') }}"><i class="fa-solid fa-tags"></i>Discounts</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="content-card">
            <h1>Manage Orders</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><span class="fw-medium">#{{ $order->id }}</span></td>
                            <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                            <td>${{ number_format($order->total_price, 2) }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($order->shipping_status) }}">
                                    {{ $order->shipping_status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.order.details', $order->id) }}" class="btn-details">
                                    <i class="fas fa-eye"></i>View Details
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
