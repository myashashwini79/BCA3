<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffd1dc, #a7c7e7, #f4f7fb);
        }

        header {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            color: #007bff;
        }

        .logout-btn {
            position: absolute;
            top: 25px;
            right: 30px;
            background-color: #dc3545;
            color: white;
            padding: 10px 18px;
            border-radius: 25px;
            text-decoration: none;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card i {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <a href="login.php" class="logout-btn">Logout</a>
</header>

<div class="dashboard">
    <div class="card">
        <i class="fas fa-user-cog"></i>
        <h3>Manage Users</h3>
        <a href="manage_users1.php">Open</a>
    </div>
    <div class="card">
        <i class="fas fa-calendar-alt"></i>
        <h3>Manage Leaves</h3>
        <a href="manage_leave.php">View</a>
    </div>
    <div class="card">
        <i class="fas fa-file-invoice-dollar"></i>
        <h3>Payroll</h3>
        <a href="payroll.php">Access</a>
    </div>
    <div class="card">
        <i class="fas fa-chart-line"></i>
        <h3>Reports</h3>
        <a href="reports.php">Open</a>
    </div>
    <div class="card">
        <i class="fas fa-user-plus"></i>
        <h3>Apply Leave</h3>
        <a href="admin_leave.php">Apply</a>
    </div>
</div>

</body>
</html>
