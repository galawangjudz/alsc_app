<?php
require_once __DIR__ . '/../models/User.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class auth extends Controller
{
    public function index()
    {


        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['user'])) {
            // User is already logged in — redirect to dashboard
            return $this->redirect('dashboard/index');
            
        }
    
        return $this->view_no_layout('auth/login');
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

         // Check if the user is already logged in
        if (isset($_SESSION['user'])) {
            // If logged in, redirect to the dashboard
            return $this->redirect('auth/index');
        }
       
        $employeeId = $_POST['employee_id'];
        $password = $_POST['password'];

        $user = User::firstWhere('employee_id', $employeeId); // Removed ->first()

        if (!$user || !hashPassword($user->password)) {
            $_SESSION['error'] = "Invalid Employee ID or Password.";
            return $this->view_no_layout('auth/login');
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'employee_id' => $user->employee_id,
            'name' => $user->name,
            'role_id' => $user->role_id,
        ];

        log_activity('login', 'Auth', "User {$user->name} logged in");

        return $this->redirect('dashboard/index');
        #return $this->view('dashboard/index');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        log_activity('logout', 'Auth', "User logged out");

        session_destroy();
        return $this->redirect('auth/index');
    }

    public function notfound()
    {
        $this->view('404_page');
    }

    public function markAsRead() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $notificationId = $_POST['id'];
            
            // Call the Notification model method to mark the notification as read
            Notification::markAsRead($notificationId);
            
            // Optionally, send a response if needed
            echo json_encode(['status' => 'success']);
        }
    }
}
