<!-- resources/views/admin/view-user.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User - Admin Dashboard</title>
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
            max-width: 600px;
            margin: 0 auto;
        }
        .content-card h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #3730a3;
            margin-bottom: 32px;
            text-align: center;
        }
        .user-info {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 32px;
        }
        .user-info p {
            margin-bottom: 16px;
            color: #1e40af;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }
        .user-info p:last-child {
            margin-bottom: 0;
        }
        .user-info p i {
            width: 24px;
            margin-right: 12px;
            color: #6366f1;
        }
        .user-info strong {
            color: #3730a3;
            font-weight: 600;
            margin-right: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .btn-primary i {
            margin-right: 8px;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99,102,241,0.2);
            color: #fff;
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
            <li><a href="{{ route('admin.viewUsers') }}" class="active"><i class="fa-solid fa-users"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.orders') }}"><i class="fa-solid fa-box"></i>Orders</a></li>
            <li><a href="{{ route('admin.discounts') }}"><i class="fa-solid fa-tags"></i>Discounts</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="content-card">
            <h1>User Details</h1>
            
            <div class="user-info">
                <p>
                    <i class="fas fa-user"></i>
                    <strong>Name:</strong> {{ $user->name }}
                </p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <strong>Email:</strong> {{ $user->email }}
                </p>
            </div>

            <a href="{{ route('admin.viewUsers') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>Back to Users List
            </a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>
