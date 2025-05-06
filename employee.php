<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Employee') {
    header("Location: login.php");
    exit();
}
$username = htmlspecialchars($_SESSION['username']);
$role = htmlspecialchars($_SESSION['role'] ?? 'Employee');
$profileImage = 'x1.jpg'; // Update if dynamic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary: #ffffff;
            --accent: #4F46E5;
            --bg-light: #f9fafb;
            --bg-dark: #e0e7ff;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --card-bg: #ffffff;
            --shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            --highlight: #22c55e;
            --error: #ef4444;
            --font-heading: 'Poppins', sans-serif;
            --font-body: 'Inter', sans-serif;
        }

        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: var(--bg-dark);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            padding: 20px;
            border-right: 1px solid #e5e7eb;
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 16px;
            background: #eef2ff;
            border: 1px solid #c7d2fe;
        }

        .sidebar .profile img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid var(--accent);
        }

        .sidebar .profile h3 {
            font-size: 20px;
            margin-bottom: 5px;
            font-family: var(--font-heading);
        }

        .sidebar .profile p {
            font-size: 14px;
            color: var(--text-light);
        }

        .main {
            flex: 1;
            margin-left: 250px;
            padding: 40px;
            background-color: var(--bg-light);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 600;
            font-family: var(--font-heading);
        }

        .logout-btn {
            background-color: var(--error);
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        .profile-card {
            display: flex;
            align-items: center;
            background-color: var(--card-bg);
            padding: 25px;
            border-radius: 16px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            border: 1px solid #e5e7eb;
        }

        .profile-card img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 25px;
        }

        .profile-info h3 {
            font-size: 22px;
            margin-bottom: 4px;
            font-family: var(--font-heading);
        }

        .profile-info p {
            font-size: 15px;
            color: var(--text-light);
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 25px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 18px;
            padding: 28px 24px;
            box-shadow: var(--shadow);
            text-align: center;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            font-family: var(--font-body);
        }

        .card:hover {
            transform: translateY(-6px);
            background: linear-gradient(135deg, #eef2ff 0%, #f0f9ff 100%);
            box-shadow: 0 14px 30px rgba(79, 70, 229, 0.15);
            color: var(--accent);
        }

        .card i {
            font-size: 36px;
            color: var(--accent);
            margin-bottom: 14px;
        }

        .card h4 {
            font-family: var(--font-heading);
            font-size: 18px;
            margin-bottom: 6px;
        }

        .card p {
            font-size: 14px;
            color: var(--text-light);
        }

        @media (max-width: 758px) {
            .sidebar {
                display: none;
            }

            body {
                flex-direction: column;
            }

            .main {
                padding: 20px;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="profile">
            <img src="<?= $profileImage ?>" alt="Profile Picture">
            <h3><?= $username ?></h3>
            <p><?= $role ?></p>
        </div>
    </aside>

    <main class="main">
        <div class="header">
            <h1>Welcome, <?= $username ?></h1>
            <a href="login.php" class="logout-btn">Logout</a>
        </div>

        <section class="profile-card">
            <img src="<?= $profileImage ?>" alt="Profile Picture">
            <div class="profile-info">
                <h3><?= $username ?></h3>
                <p><?= $role ?> | yashumohan9930@gmail.com</p>
            </div>
        </section>

        <section class="dashboard-cards">
            <a href="apply_leave.php" class="card">
                <i class="fa-solid fa-calendar-check"></i>
                <h4>Apply Leave</h4>
                <p>Submit leave requests</p>
            </a>
            <a href="cab.php" class="card">
                <i class="fa-solid fa-taxi"></i>
                <h4>Cab Service</h4>
                <p>Book office transportation</p>
            </a>
            <a href="settings.php" class="card">
                <i class="fa-solid fa-gear"></i>
                <h4>Account Settings</h4>
                <p>Manage your profile</p>
            </a>
            <a href="emp_appraisal.php" class="card">
                <i class="fa-solid fa-award"></i>
                <h4>Appraisal</h4>
                <p>Check your appraisal score</p>
            </a>
            <a href="payroll.php" class="card">
                <i class="fa-solid fa-money-check-dollar"></i>
                <h4>Salary</h4>
                <p>View salary slips</p>
            </a>
        </section>
    </main>
</body>
</html>
