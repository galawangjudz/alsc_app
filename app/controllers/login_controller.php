<?php
require_once __DIR__ . '/../models/User.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class login extends Controller
{
    public function showLoginForm()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['user'])) {
            // User is already logged in — redirect to dashboard
            return $this->view('dashboard/index');
            
        }
    
        return $this->view('auth/login');
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $employeeId = $_POST['employee_id'];
        $password = $_POST['password'];

        $user = User::firstWhere('employee_id', $employeeId); // Removed ->first()

        if (!$user || !hashPassword($user->password)) {
            $_SESSION['error'] = "Invalid Employee ID or Password.";
            return $this->view('auth/login');
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'employee_id' => $user->employee_id,
            'name' => $user->name,
            'role_id' => $user->role_id,
        ];

        return $this->view('dashboard/index');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        return $this->view('auth/login');
    }

    public function notfound()
    {
        $this->view('404_page');
    }
}
