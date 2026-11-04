<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

require_once 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = :id");
$stmt->execute([':id' => $id]);
$reg = $stmt->fetch();

if (!$reg) {
    header("Location: admin_dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="max-width: 600px;">
    <header>
        <h2>Registration Details</h2>
        <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </header>

    <div class="event-card">
        <p><strong>Registration ID:</strong> <?= htmlspecialchars($reg['id']) ?></p>
        <p><strong>Full Name:</strong> <?= htmlspecialchars($reg['name']) ?></p>
        <p><strong>Email Address:</strong> <?= htmlspecialchars($reg['email']) ?></p>
        <p><strong>Event:</strong> <?= htmlspecialchars($reg['event_title']) ?></p>
        <p><strong>Registered At:</strong> <?= htmlspecialchars($reg['registered_at']) ?></p>
    </div>
</div>
</body>
</html>