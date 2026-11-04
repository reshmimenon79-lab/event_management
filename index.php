<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM events ORDER BY event_date ASC");
$events = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Upcoming Events</h1>
        <a href="admin_login.php" class="btn btn-secondary">Admin Login</a>
    </header>

    <?php if (empty($events)): ?>
        <p>No upcoming events available at the moment.</p>
    <?php else: ?>
        <?php foreach ($events as $event): ?>
            <div class="event-card">
                <h3><?= htmlspecialchars($event['title']) ?></h3>
                <div class="event-date">Date: <?= htmlspecialchars($event['event_date']) ?></div>
                <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                <br>
                <a href="register.php?event=<?= urlencode($event['title']) ?>" class="btn">Register</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>