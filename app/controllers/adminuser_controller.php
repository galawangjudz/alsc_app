<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../middleware/AdminMiddleware.php';


class adminuser extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle();
    }
    public function index()
    {
        $users = User::all();
        return $this->view('admin/users/index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all();
        return $this->view('admin/users/create', ['roles' => $roles]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return $this->view('admin/users/edit', ['user' => $user, 'roles' => $roles]);
    }
}

