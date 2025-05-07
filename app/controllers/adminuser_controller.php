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
        #echo "<pre>"; print_r($users); exit;
        return $this->view('admin/users/index', ['users' => $users]);
    }
    public function create()
    {
      
        $roles = Roles::all();
        return $this->view('admin/users/create', ['roles' => $roles]);
    }

    public function store()
    {
        $data = $_POST;
        User::insert($data);
        ActivityLog::log(current_user_id(), 'add', 'Role', 'Added employee ID ' . $data['employee_id']); 

        return $this->redirect('adminuser/user_list');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::all();
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
        ActivityLog::log(current_user_id(), 'update', 'Users', 'Updated user id ' . $id);
        return $this->redirect('adminuser/user_list');
        #return $this->view('admin/users/index', ['users' => $users]);
        
    }
    public function notfound()
    {
        $this->view('404_page');
    }

}

