<?php

class Auth {
    public static function login($username, $password) {
        $user = new User();
        $userDetails = $user->getUserByUsername($username);

        if (password_verify($password, $userDetails['password'])) {
            $_SESSION['user_id'] = $userDetails['id'];
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

    public static function check() {
        return isset($_SESSION['user_id']);
    }
}
