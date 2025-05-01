<?php

require_once __DIR__ . '/../models/PermissionRole.php';

function can($permission)
{
    // Make sure the session and role_id exist
    if (empty($_SESSION['user']['role_id'])) {
        return false;
    }

    // Cache permissions in session
    if (!isset($_SESSION['user']['permissions'])) {
        $role_id = $_SESSION['user']['role_id'];
        $permissionObjects = PermissionRole::getPermissionsForRole($role_id);

        $_SESSION['user']['permissions'] = array_map(fn($perm) => $perm->name, $permissionObjects);
    }

    return in_array($permission, $_SESSION['user']['permissions']);
}
