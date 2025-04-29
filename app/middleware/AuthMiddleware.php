<?php

class AuthMiddleware
{
    public static function handle()
    {
        if (!isset($_SESSION['user'])) {
            redirect('/login');
            exit;
        }
    }
}
