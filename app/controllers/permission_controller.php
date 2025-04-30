<?php

require_once __DIR__ . '/../models/Permissions.php';
require_once __DIR__ . '/../middleware/AdminMiddleware.php';

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
        return $this->redirect('permission/index');
    }

    public function delete($id)
    {
        Permissions::delete($id);
        return $this->redirect('permission/index');
    }
}
