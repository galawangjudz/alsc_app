<?php
class AdminMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || is_admin() != 1) { // assuming role_id 1 = admin
            echo "<h1 class='text-danger'>Access Denied</h1>";
            echo "<p>You do not have permission to access this page.</p>";
            echo "<a href='" . ROOT . "/auth/index'>Go back</a>";
            exit();
        }
    }
}
