<?php

class Auth {
    public static function hasPermission($permission) {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            return false;
        }

        // Get the user's role (assuming user_id is stored in session)
        $userId = $_SESSION['user_id'];
        $userModel = new User();
        $userRole = $userModel->getUserRole($userId); // Get user's role from DB

        // Fetch permissions for the role
        $roleModel = new Role();
        $permissions = $roleModel->getPermissionsForRole($userRole['id']);

        // Check if the role has the requested permission
        foreach ($permissions as $perm) {
            if ($perm['name'] == $permission) {
                return true; // The role has this permission
            }
        }

        return false; // No such permission found
    }
}
