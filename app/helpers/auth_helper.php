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

// Assuming you have a function to get the current user's role
function current_user_role_can_act_on($current_step) {
    // Map numeric role IDs to their role names
    $role_map = [
        1 => 'admin',
        2 => 'sales',
        3 => 'coo',
        4 => 'cashier',
        5 => 'ca',
        6 => 'cfo',
    ];

    // Get the user's role name
    $role_id = $_SESSION['user']['role_id'] ?? null;
    $user_role = $role_map[$role_id] ?? null;

    // Define which roles can act on each step
    $permissions = [
        'sales' => ['sales', 'admin'],
        'coo' => ['coo', 'admin'],
        'cashier' => ['cashier', 'admin'],
        'credit_assessment' => ['ca', 'admin'],
        'cfo' => ['cfo', 'admin'],
    ];

    return in_array($user_role, $permissions[$current_step] ?? []);
}

function renderStep($logs, $step) {
    $log = array_filter($logs, fn($l) => $l->step === $step);
    if (!$log) return '<span class="badge bg-secondary">Pending</span>';
    $log = array_shift($log);
    $status = $log->status;
    $badge = match($status) {
        'approved' => 'success',
        'validated' => 'primary',
        'voided', 'disapproved' => 'danger',
        'for revision' => 'warning',
        default => 'secondary'
    };
    return "<span class='badge bg-{$badge}'>" . ucfirst($status) . "</span>";
}