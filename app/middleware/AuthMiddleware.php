<?php

class AuthMiddleware {

    // Check if the user is logged in before proceeding
    public static function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login"); // Redirect to login if not authenticated
            exit;
        }
    }

    // Check if the user has the required permission
    public static function checkPermission($permission) {
        if (!Auth::hasPermission($permission)) {
            echo "You don't have permission to access this page.";
            exit;
        }
    }
}
