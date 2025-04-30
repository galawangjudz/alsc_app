<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Role.php';
require_once __DIR__ . '/../middleware/AdminMiddleware.php';


class adminuser extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle();
    }

    public function user_list()
    {
        $users = User::all();
        #echo "<pre>"; print_r($users); exit;
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
    public function update($id)
    {
        $data = $_POST;

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        User::update($id, $data);
        $users = User::all();
       
        return $this->view('admin/users/index', ['users' => $users]);
        
    }
}

