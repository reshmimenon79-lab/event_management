<?php
require_once 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = :id");
$stmt->execute([':id' => $id]);
$reg = $stmt->fetch();

if (!$reg) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="alert-success">
        <h2>Registration Successful!</h2>
        <p>Thank you, <strong><?= htmlspecialchars($reg['name']) ?></strong>. Your registration has been recorded.</p>
    </div>

    <div class="event-card">
        <h3>Registration Summary</h3>
        <p><strong>Registration ID:</strong> #<?= htmlspecialchars($reg['id']) ?></p>
        <p><strong>Event:</strong> <?= htmlspecialchars($reg['event_title']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($reg['email']) ?></p>
        <p><strong>Registered At:</strong> <?= htmlspecialchars($reg['registered_at']) ?></p>
    </div>

    <a href="index.php" class="btn">Back to Home</a>
</div>
</body>
</html>