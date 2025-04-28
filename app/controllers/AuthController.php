<?php

class AuthController extends Controller {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect data from the form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role_id = 2; // Default to a regular user role

            // Validate inputs (simple validation for example)
            if (empty($username) || empty($email) || empty($password)) {
                echo "All fields are required!";
                return;
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $userModel = new User();
            $userModel->createUser($username, $hashedPassword, $email, $role_id);

            // Redirect to login page
            header("Location: /login");
        } else {
            $this->view->render('auth/register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect data from the form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate inputs
            if (empty($username) || empty($password)) {
                echo "Username and password are required!";
                return;
            }

            // Check if user exists
            $userModel = new User();
            $user = $userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, start the session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];

                // Redirect to the dashboard or homepage
                header("Location: /dashboard");
            } else {
                echo "Invalid credentials!";
            }
        } else {
            $this->view->render('auth/login');
        }
    }

    public function logout() {
        // Destroy the session and log the user out
        session_start();
        session_unset();
        session_destroy();

        // Redirect to login page
        header("Location: /login");
    }
}
