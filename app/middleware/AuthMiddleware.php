<?php

class AuthMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the session has expired due to inactivity (30 minutes here)
        if (!isset($_SESSION['LAST_ACTIVITY'])) {
            $_SESSION['LAST_ACTIVITY'] = time();
        } elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1800) { // 1800 seconds = 30 minutes
            session_unset();
            session_destroy();
            $_SESSION['error'] = "Session expired due to inactivity.";
            header("Location: " . BASE_URL . "/auth/index");
            exit();
        }

        // Update the last activity time
        $_SESSION['LAST_ACTIVITY'] = time();

        // Check if user is logged in, if not, redirect to login
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Please log in to access this page.";
            header("Location: " . BASE_URL . "/auth/index");
            exit();
        }
    
    }

    
}
