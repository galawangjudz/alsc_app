<?php
class AdminMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || is_admin() != 1) { // assuming role_id 1 = admin
            header("Location: " . BASE_URL . "/auth/index");
            exit();
        }
    }
}
