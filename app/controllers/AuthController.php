<?php
namespace alsc_app\app\controllers;

// app/controllers/AuthController.php


class AuthController {

    public function login() {
        // Handle both GET (show login form) and POST (process login) requests
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the POST request to authenticate user
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Here, authenticate the user using a User model or other logic
            if ($this->authenticate($email, $password)) {
                // Redirect to dashboard if successful
                header('Location: /dashboard');
                exit;
            } else {
                // Redirect back to login with an error message if authentication fails
                $_SESSION['error'] = 'Invalid email or password';
                header('Location: /login');
                exit;
            }
        }

        // Handle GET request to show the login form
        require_once 'app/views/auth/login.php';
    }

    // Add your authentication logic here (e.g., checking database, password, etc.)
    private function authenticate($email, $password) {
        // Example logic - you should replace this with actual authentication logic
        return $email === 'user@example.com' && $password === 'password';
    }
}

