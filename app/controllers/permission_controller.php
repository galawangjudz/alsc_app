<?php

require_once __DIR__ . '/../models/Permissions.php';
#require_once __DIR__ . '/../middleware/AdminMiddleware.php';

class permission extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle();
    }

    public function index()
    {
        $permissions = Permissions::all();
        return $this->view('admin/permissions/index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return $this->view('admin/permissions/create');
    }

    public function store()
    {
        $data = $_POST;
        Permissions::insert($data);
        ActivityLog::log($_SESSION['employee_id'], 'add', 'Permission', 'Added permission name ' . $data['name']);
        return $this->redirect('permission/index');
    }

    public function edit($id)
    {
        $permission = Permissions::find($id);
        return $this->view('admin/permissions/edit', ['permission' => $permission]);
    }

    public function update($id)
    {
        $data = $_POST;
        Permissions::update($id, $data);
        ActivityLog::log($_SESSION['employee_id'], 'update', 'Permission', 'Updated permission ID ' . $id);

        return $this->redirect('permission/index');
    }

    public function delete($id)
    {
        #ActivityLog::log($_SESSION['employee_id'], 'delete', 'Permission', 'Deleted permission ID ' . $id);
        Permissions::delete($id);
        #ActivityLog::log($_SESSION['employee_id'], 'delete', 'Permission', 'Deleted permission ID ' . $id);
        return $this->redirect('permission/index');
    }
    public function notfound()
    {
        $this->view('404_page');
    }

}
