<!-- resources/views/admin/view-users.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
            width: 100% !important;
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
        .btn-view {
            background: linear-gradient(135deg, #6366f1 0%, #3730a3 100%);
            border: none;
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-right: 8px;
        }
        .btn-view i {
            margin-right: 6px;
        }
        .btn-view:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(99,102,241,0.2);
            color: #fff;
        }
        .btn-edit {
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
            border: none;
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-right: 8px;
        }
        .btn-edit i {
            margin-right: 6px;
        }
        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(251,191,36,0.2);
            color: #fff;
        }
        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s;
            color: #fff;
            display: inline-flex;
            align-items: center;
        }
        .btn-delete i {
            margin-right: 6px;
        }
        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239,68,68,0.2);
            color: #fff;
        }
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 16px;
        }
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 6px 12px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 8px 16px;
            margin: 0 4px;
            border-radius: 6px;
            border: none;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #6366f1;
            color: #fff !important;
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
            <h1>Manage Users</h1>
            <div class="table-responsive">
                <table id="users-table" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><span class="fw-medium">{{ $user->name }}</span></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('M d, Y') : 'No Date' }}</td>
                                <td>
                                    <a href="{{ route('admin.viewUser', $user->id) }}" class="btn-view">
                                        <i class="fas fa-eye"></i>View
                                    </a>
                                    <a href="{{ route('admin.editUser', $user->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash-alt"></i>Delete
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                pageLength: 10,
                order: [[0, 'asc']],
                language: {
                    search: "Search users:",
                    lengthMenu: "Show _MENU_ users per page",
                }
            });
        });
    </script>
</body>
</html>
