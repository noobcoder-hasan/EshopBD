<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discounts - Admin Dashboard</title>
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
        .content-card h3 {
            font-size: 1.4rem;
            color: #6366f1;
            margin-bottom: 16px;
        }
        .form-label {
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px 16px;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99,102,241,0.2);
        }
        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s;
        }
        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239,68,68,0.2);
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
    <!-- Side Navigation Bar -->
    <div class="sidebar">
        <div class="logo mb-4">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Admin</span>
        </div>
        <ul class="list-unstyled">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.viewUsers') }}"><i class="fa-solid fa-users"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.orders') }}"><i class="fa-solid fa-box"></i>Orders</a></li>
            <li><a href="{{ route('admin.discounts') }}" class="active"><i class="fa-solid fa-tags"></i>Discounts</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Add Discount Form -->
        <div class="content-card">
            <h1>Manage Discounts</h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-container">
                        <h3>Add New Discount</h3>
                        <form method="POST" action="{{ route('discount.store') }}" class="mt-4">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Discount Code</label>
                                        <input type="text" class="form-control" id="code" name="code" required placeholder="Enter discount code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" step="0.01" required placeholder="Enter percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="valid_from" class="form-label">Valid From</label>
                                        <input type="datetime-local" class="form-control" id="valid_from" name="valid_from" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="valid_until" class="form-label">Valid Until</label>
                                        <input type="datetime-local" class="form-control" id="valid_until" name="valid_until" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus-circle me-2"></i>Add Discount
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Discounts Table -->
        <div class="content-card">
            <h3>Active Discounts</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Valid From</th>
                            <th>Valid Until</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $discount)
                            <tr>
                                <td>{{ $discount->id }}</td>
                                <td><span class="fw-medium">{{ $discount->code }}</span></td>
                                <td>{{ $discount->discount_percentage }}%</td>
                                <td>{{ $discount->valid_from }}</td>
                                <td>{{ $discount->valid_until }}</td>
                                <td>
                                    <form action="{{ route('discount.destroy', $discount->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this discount?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
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
