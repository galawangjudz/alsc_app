<?php

class Auth extends Controller
{
    public function showLoginForm()
    {
        return $this->view('auth/login');
    }

    public function login()
    {
        $employeeId = $_POST['employee_id'];
        $password = $_POST['password'];

        $user = User::where('employee_id', $employeeId)->first();

        if (!$user || !password_verify($password, $user->password)) {
            $_SESSION['error'] = "Invalid Employee ID or Password.";
            return redirect('auth/login');
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'employee_id' => $user->employee_id,
            'name' => $user->name,
            'role' => $user->role->name,
        ];

        return redirect('/dashboard');
    }

    public function logout()
    {
        session_destroy();
        return redirect('auth/login');
    }
}
