<?php
require_once __DIR__ . '/../models/User.php';
class login extends Controller
{
    public function showLoginForm()
    {
       
        global $db_status; // make sure it's available
        return $this->view('auth/login');
        
    }
    
    public function login()
    {
        $employeeId = $_POST['employee_id'];
        $password = $_POST['password'];

        $user = User::where('employee_id', $employeeId)->first();

        if (!$user || !password_verify($password, $user->password)) {
            $_SESSION['error'] = "Invalid Employee ID or Password.";
            return $this->view('auth/login');
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'employee_id' => $user->employee_id,
            'name' => $user->name,
            'role_id' => $user->role_id,
        ];

        return $this->view('/dashboard');
    }

    public function logout()
    {
        session_destroy();
        return $this->view('auth/login');
    }

    public function notfound()
    {
        $this->view('404_page');
    }
}
