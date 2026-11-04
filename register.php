<?php
require_once 'db.php';

$error = '';
$eventName = isset($_GET['event']) ? trim($_GET['event']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $eventName = trim($_POST['event'] ?? '');

    // Validation: Check for empty fields & valid email
    if (empty($name) || empty($email) || empty($eventName)) {
        $error = 'All fields are mandatory.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please provide a valid email address.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO registrations (name, email, event_title) VALUES (:name, :email, :event)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':event' => $eventName
        ]);

        $lastId = $pdo->lastInsertId();
        header("Location: success.php?id=" . $lastId);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h2>Register for Event</h2>
        <a href="index.php" class="btn btn-secondary">Back to Events</a>
    </header>

    <?php if ($error): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="register.php" method="POST" id="regForm">
        <div class="form-group">
            <label for="event">Event Name</label>
            <input type="text" id="event" name="event" value="<?= htmlspecialchars($eventName) ?>" readonly required>
        </div>

        <div class="form-group">
            <label for="name">Your Full Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email Address</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>

        <button type="submit" class="btn">Confirm Registration</button>
    </form>
</div>

<script>
// Client-side quick check
document.getElementById('regForm').addEventListener('submit', function (e) {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    if (!name || !email) {
        alert('Please complete all form fields.');
        e.preventDefault();
    }
});
</script>
</body>
</html>