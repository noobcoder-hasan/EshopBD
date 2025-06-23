<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .sidebar a, .sidebar .logout-btn {
            color: #fff;
            text-decoration: none;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            font-size: 1rem;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }
        .sidebar a i, .sidebar .logout-btn i {
            margin-right: 12px;
            font-size: 1.2rem;
        }
        .sidebar a.active, .sidebar a:hover, .sidebar .logout-btn:hover {
            background: rgba(255,255,255,0.12);
            color: #e0e7ff;
        }
        .sidebar .logout-btn {
            cursor: pointer;
        }
        .main-content {
            margin-left: 260px;
            padding: 40px 24px 80px 24px;
            min-height: 100vh;
        }
        .dashboard-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(99,102,241,0.10);
            padding: 40px 32px;
            max-width: 700px;
            margin: 0 auto;
        }
        .dashboard-card h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #3730a3;
            margin-bottom: 16px;
        }
        .dashboard-card p {
            font-size: 1.15rem;
            color: #555;
            margin-bottom: 10px;
        }
        .dashboard-card .admin-info {
            background: #f1f5f9;
            border-radius: 10px;
            padding: 16px 20px;
            margin-bottom: 24px;
        }
        .dashboard-card h3 {
            font-size: 1.4rem;
            color: #6366f1;
            margin-top: 24px;
            margin-bottom: 12px;
        }
        .dashboard-card ul {
            padding-left: 0;
            list-style: none;
        }
        .dashboard-card ul li {
            margin: 10px 0;
        }
        .dashboard-card ul li a {
            color: #6366f1;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .dashboard-card ul li a:hover {
            color: #3730a3;
            text-decoration: underline;
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
                padding: 24px 8px 80px 8px;
            }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                flex-direction: row;
                padding-top: 0;
                box-shadow: none;
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
        <ul class="list-unstyled flex-grow-1">
            <li><a href="#" class="active"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.viewUsers') }}"><i class="fa-solid fa-users"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.orders') }}"><i class="fa-solid fa-box"></i>Orders</a></li>
            <li><a href="{{ route('admin.discounts') }}"><i class="fa-solid fa-tags"></i>Discount</a></li>
            <li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="dashboard-card">
            <h1>Welcome to the Admin Dashboard</h1>
            <p>You are logged in as an admin. Manage the website from here.</p>
            <div class="admin-info mb-4">
                <p><strong>Admin ID:</strong> {{ $admin->id }}</p>
                <p><strong>Email:</strong> {{ $admin->email }}</p>
            </div>
            <h3>Admin Options:</h3>
            <ul>
                <li><a href="{{ route('admin.viewUsers') }}"><i class="fa-solid fa-users"></i> View Users</a></li>
                <li><a href="{{ route('admin.orders') }}"><i class="fa-solid fa-box"></i> View Orders</a></li>
            </ul>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
