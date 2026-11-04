<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM registrations ORDER BY registered_at DESC");
$registrations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="max-width: 1000px;">
    <header>
        <h2>Admin Dashboard</h2>
        <div>
            <span>Welcome, <strong><?= htmlspecialchars($_SESSION['admin_user']) ?></strong></span>
            <a href="admin_logout.php" class="btn btn-secondary" style="margin-left: 10px;">Logout</a>
        </div>
    </header>

    <h3>Event Registrations</h3>

    <?php if (empty($registrations)): ?>
        <p style="margin-top: 15px;">No registrations found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['event_title']) ?></td>
                        <td><?= htmlspecialchars($row['registered_at']) ?></td>
                        <td class="action-links">
                            <a href="admin_view.php?id=<?= $row['id'] ?>" class="btn" style="padding: 4px 8px; font-size: 13px;">View</a>
                            <a href="admin_delete.php?id=<?= $row['id'] ?>" 
                               class="btn btn-danger" 
                               style="padding: 4px 8px; font-size: 13px;"
                               onclick="return confirm('Delete this registration?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>