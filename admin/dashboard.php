<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM admissions ORDER BY created_at DESC");
$admissions = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Al-Noor Academy</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-nav { background: var(--primary-dark); color: white; padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; }
        .dashboard-container { padding: 40px 5%; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow); }
        th, td { padding: 15px 20px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8fafc; font-weight: 700; color: var(--primary-dark); }
        .status-badge { padding: 5px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; }
        .status-pending { background: #fef3c7; color: #92400e; }
    </style>
</head>
<body style="background: #f1f5f9;">

    <div class="admin-nav">
        <div class="logo" style="color: white;">
            <i class="fa-solid fa-gauge-high"></i>
            <span>ADMIN PANEL</span>
        </div>
        <div>
            <span>Welcome, <?php echo $_SESSION['admin_username']; ?></span>
            <a href="logout.php" style="color: white; margin-left: 20px; text-decoration: none; font-weight: 600;">Logout</a>
        </div>
    </div>

    <div class="dashboard-container">
        <h2 style="margin-bottom: 30px;">Student Admissions</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Contact</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($admissions as $row): ?>
                <tr>
                    <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                    <td>
                        <strong><?php echo htmlspecialchars($row['full_name']); ?></strong><br>
                        <small><?php echo htmlspecialchars($row['email']); ?></small>
                    </td>
                    <td><?php echo htmlspecialchars($row['course']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><span class="status-badge status-pending"><?php echo ucfirst($row['status']); ?></span></td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($admissions)): ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px;">No admissions found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
