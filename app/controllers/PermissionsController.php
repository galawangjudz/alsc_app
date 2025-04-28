<?php
class Controller {
    protected $view;
    protected $model;

    public function __construct($model = null) {
        $this->view = new View();
        $this->model = $model;
    }
}


class PermissionsController extends Controller {
    public function index() {
        $permissionModel = new Permission();
        $permissions = $permissionModel->getAllPermissions();
        $this->view->render('permissions/index', ['permissions' => $permissions]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $permissionModel = new Permission();
            $permissionModel->createPermission($_POST['name'], $_POST['description']);
            header("Location: /permissions");
        } else {
            $this->view->render('permissions/create');
        }
    }

    public function assign($roleId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleModel = new Role();
            $roleModel->assignPermissions($roleId, $_POST['permissions']);
            header("Location: /roles/{$roleId}/permissions");
        } else {
            $roleModel = new Role();
            $role = $roleModel->getRoleById($roleId);
            $permissionModel = new Permission();
            $permissions = $permissionModel->getAllPermissions();
            $this->view->render('permissions/assign', ['role' => $role, 'permissions' => $permissions]);
        }
    }
}
