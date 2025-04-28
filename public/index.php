<?php
// /public/index.php

require_once '../app/config/Database.php';
require_once '../app/models/User.php';
require_once '../app/controllers/UserController.php';

// Start a session
session_start();

// Initialize the UserController
$userController = new UserController();

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'register') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($userController->register($username, $password)) {
            echo "User  registered successfully!";
        } else {
            echo "Registration failed!";
        }
    }

    // Handle login
    if ($_POST['action'] === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $userController->login($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Login successful! Welcome, " . $user['username'];
        } else {
            echo "Login failed! Invalid credentials.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login/Register</title>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form method="POST">
        <input type="hidden" name="action" value="register">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <h2>Login</h2>
    <form method="POST">
        <input type="hidden" name="action" value="login">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>