<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Roles.php';

class adminuser extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();
    }

    public function user_list()
    {
        $users = User::all();
        return $this->view('admin/users/index', compact('users'));
    }

    public function create()
    {
        $roles = Roles::all();
        return $this->view('admin/users/create', compact('roles'));
    }

    public function store()
    {
        $data = $_POST;

        User::insert($data);
        ActivityLog::log(current_user_id(), 'add', 'User', 'Added employee ID ' . $data['employee_id']);

        return $this->redirect('adminuser/user_list');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::all();
        return $this->view('admin/users/edit', compact('user', 'roles'));
    }

    public function update($id)
    {
        $data = $_POST;

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        User::update($id, $data);
        ActivityLog::log(current_user_id(), 'update', 'User', 'Updated user ID ' . $id);

        return $this->redirect('adminuser/user_list');
    }

    public function notfound()
    {
        return $this->view('404_page');
    }
}
