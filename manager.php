<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Manager') {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f7f9fc, #eef1f6);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: #333;
    }

    header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        padding: 20px 40px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        box-shadow: 0px 6px 16px rgba(0,0,0,0.2);
        border-bottom: 4px solid #5a4f9c;
    }

    header h1 {
        font-size: 32px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-info {
        font-size: 16px;
        opacity: 0.9;
        margin-top: 8px;
        color: #fff;
    }

    .logout-btn {
        background: #ff4b5c;
        padding: 12px 24px;
        border-radius: 35px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
    }

    .logout-btn:hover {
        background: #e8434e;
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .container {
        padding: 50px 30px;
        flex: 1;
        width: 95%;
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }

    .welcome-box {
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .welcome-box h2 {
        font-size: 28px;
        margin-bottom: 15px;
        font-weight: 700;
        color: #333;
    }

    .welcome-box p {
        font-size: 18px;
        color: #555;
        opacity: 0.8;
    }

    nav {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    nav a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 160px;
        height: 160px;
        padding: 20px;
        border-radius: 20px;
        background: #ffffff;
        color: #333;
        font-weight: 600;
        text-decoration: none;
        font-size: 16px;
        box-shadow: 0px 6px 16px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    nav a:hover {
        background: #eef1f6;
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
    }

    nav a .icon {
        width: 42px;
        height: 42px;
        stroke-width: 2.5px;
        color: #667eea;
        margin-bottom: 16px;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    nav a:hover .icon {
        transform: scale(1.15);
        color: #764ba2;
    }



    </style>
</head>
<body>

<header>
    <div>
        <h1><i data-lucide="layout-dashboard" class="icon"></i> Manager Dashboard</h1>
        <div class="user-info">Logged in as: <strong><?= $username ?></strong></div>
    </div>
    <a href="login.php" class="logout-btn">Logout</a>
</header>

<div class="container">
    <div class="welcome-box">
        <h2>Welcome, <?= $username ?>!</h2>
        <p>Good morning, <strong><?= $username ?></strong>! Here's to a productive and purpose-driven day. Your leadership continues to shape the team's success and bring clarity to our goals. As you navigate through today's priorities, remember that every decision you make leaves a lasting impact. Let's lead with confidence, inspire through action, and make today exceptional.</p>

    </div>
    <nav>
        <a href="apply_leave.php" class="active">
            <i data-lucide="calendar-plus" class="icon"></i>
            Apply Leave
        </a>
        <a href="manage_leave1.php">
            <i data-lucide="check-circle" class="icon"></i>
            Manage Leaves
        </a>
        <a href="cab.php">
            <i data-lucide="car" class="icon"></i>
            Cab Bookings
        </a>
        <a href="reports1.php">
            <i data-lucide="bar-chart-2" class="icon"></i>
            View Reports
        </a>
        <a href="admin_appraisal.php">
            <i data-lucide="file-plus" class="icon"></i>
             Add Appraisal
        </a>
        <a href="settings.php">
            <i data-lucide="settings" class="icon"></i>
            Settings
        </a>
    </nav>



</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
