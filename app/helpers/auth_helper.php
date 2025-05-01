<?php
function can($permission)
{
    $userRole = $_SESSION['user']['role_id'];

    $role = Roles::where('name', $userRole)->first();

    $permissions = $role->permissions()->pluck('name')->toArray();

    return in_array($permission, $permissions);
}