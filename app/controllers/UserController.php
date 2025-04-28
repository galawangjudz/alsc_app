<?php

class UsersController extends Controller {
    
    public function index() {
        $userModel = new User();
        $users = $userModel->getAllUsers();
        $this->view->render('users/index', ['users' => $users]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming user has permission to create users
            if (!Auth::hasPermission('create_user')) {
                echo "You don't have permission to create users.";
                return;
            }

            $userModel = new User();
            $userModel->createUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['role_id']);
            header("Location: /users");
        } else {
            $roleModel = new Role();
            $roles = $roleModel->getAllRoles(); // Get all roles for role selection
            $this->view->render('users/create', ['roles' => $roles]);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if user has permission to edit
            if (!Auth::hasPermission('edit_user')) {
                echo "You don't have permission to edit users.";
                return;
            }

            $userModel = new User();
            $userModel->updateUser($id, $_POST['username'], $_POST['email'], $_POST['role_id']);
            header("Location: /users");
        } else {
            $userModel = new User();
            $user = $userModel->getUserById($id);
            $roleModel = new Role();
            $roles = $roleModel->getAllRoles();
            $this->view->render('users/edit', ['user' => $user, 'roles' => $roles]);
        }
    }

    public function delete($id) {
        // Check if user has permission to delete
        if (!Auth::hasPermission('delete_user')) {
            echo "You don't have permission to delete users.";
            return;
        }

        $userModel = new User();
        $userModel->deleteUser($id);
        header("Location: /users");
    }
}
