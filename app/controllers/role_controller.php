<?php

require_once __DIR__ . '/../models/Permissions.php';
require_once __DIR__ . '/../models/Roles.php';
require_once __DIR__ . '/../models/PermissionRole.php';
require_once __DIR__ . '/../middleware/AdminMiddleware.php';


class Role extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle();
    }

    public function index()
    {
        $roles = Roles::all();
        
        return $this->view('admin/roles/index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = Permissions::all();
        
        return $this->view('admin/roles/create', ['permissions' => $permissions]);
    }

    public function store()
    {
        $data = $_POST;
        $role_id = Roles::insert($data);

        if (!empty($data['permissions'])) {
            PermissionRole::assign($role_id, $data['permissions']);
        }

        return $this->redirect('role/index');
    }

    public function edit($id)
    {
        $role = Roles::find($id);
        $permissions = Permissions::all();
        $assigned = PermissionRole::getPermissionIdsForRole($id);

        return $this->view('admin/roles/edit', [
            'role' => $role,
            'permissions' => $permissions,
            'assigned' => $assigned
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        Roles::update($id, $data);

        if (!empty($data['permissions'])) {
            PermissionRole::assign($id, $data['permissions']);
        }

        return $this->redirect('role/index');
    }

    public function delete($id)
    {
        Roles::delete($id);
        return $this->redirect('role/index');
    }
}