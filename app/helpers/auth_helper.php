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
        10 => 'agent',
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
        'agent' => ['agent', 'admin'],
        'sales' => ['sales', 'admin'],
        'coo' => ['coo', 'admin'],
        'cashier' => ['cashier', 'admin'],
        'credit_assessment' => ['ca', 'admin'],
        'cfo' => ['cfo', 'admin'],
    ];

    return in_array($user_role, $permissions[$current_step] ?? []);
}

function renderStep_old($logs, $step) {
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

function renderStep($logs, $step) {
 
    $step_logs = array_filter($logs, fn($l) => $l->step === $step);
    if (empty($step_logs)) return '<span class="badge bg-secondary">Pending</span>';
    // Sort logs for the step by created_at (descending order) to get the most recent one
    usort($step_logs, fn($a, $b) => strtotime($b->created_at) - strtotime($a->created_at));
    // Get the most recent log for the step
    $latest_log = $step_logs[0];
    // Determine the badge color based on the status
    $badge = match($latest_log->status) {
        'approved' => 'success',
        'validated' => 'primary',
        'voided', 'disapproved' => 'danger',
        'for revision' => 'warning',
        default => 'secondary'
    };

    // Return the badge with the status
    return "<span class='badge bg-{$badge}'>" . ucfirst($latest_log->status) . "</span>";
}