<?php

class PermissionMiddleware
{
    public static function handle($requiredPermission)
    {
        $userRole = $_SESSION['user']['role'];

        $role = Role::where('name', $userRole)->first();

        $permissions = $role->permissions()->pluck('name')->toArray();

        if (!in_array($requiredPermission, $permissions)) {
            die('Access Denied: You do not have permission.');
        }
    }
}
