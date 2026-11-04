<?php
session_start();
require_once 'db.php';

$error = '';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Direct check for admin credentials
    if ($username === 'admin' && $password === 'adminpassword') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = 'admin';
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = 'Invalid admin credentials.';
    }
}
?>