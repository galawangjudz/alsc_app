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


function get_current_user_role() {
    $role_map = [
        10 => 'agent',
        1 => 'admin',
        2 => 'sales',
        3 => 'coo',
        4 => 'cashier',
        5 => 'ca',
        6 => 'cfo',
    ];

    $role_id = $_SESSION['user']['role_id'] ?? null;
    return $role_map[$role_id] ?? null;
}

function can_user_act_on_step($current_step) {
    $permissions = [
        'agent' => ['agent', 'admin'],
        'sales' => ['sales', 'admin'],
        'coo' => ['coo', 'admin'],
        'cashier' => ['cashier', 'admin'],
        'ca' => ['ca', 'admin'],
        'cfo' => ['cfo', 'admin'],
    ];

    $user_role = get_current_user_role();
    return in_array($user_role, $permissions[$current_step] ?? []);
}


function get_action_button($reservation) {
    $role = get_current_user_role();
    $step = $reservation->current_step;
    $status = $reservation->status;
    $id = $reservation->id;

    // Match role and step to define what action is valid
    switch ($step) {
        case 'agent':
            if ($role === 'agent' && $status === 'draft') {
                return '<a href="' . url("reservation/SubmitToSale/{$id}") . '" class="btn btn-sm btn-warning">Submit to Sales</a>';
            }
            break;

        case 'sales':
            if ($role === 'sales' && $status === 'submitted') {
                return '
                    <a href="' . url("reservation/validate/{$id}") . '" class="btn btn-sm btn-success">Validate</a>
                    <a href="' . url("reservation/void/{$id}") . '" class="btn btn-sm btn-danger">Void</a>';
            }
            break;

        case 'coo':
            if ($role === 'coo'&& $status === 'validated') {
                return '
                    <a href="' . url("reservation/approve/{$id}") . '" class="btn btn-sm btn-success">Approve</a>
                    <a href="' . url("reservation/disapprove/{$id}") . '" class="btn btn-sm btn-danger">Disapprove</a>';
            }
            break;

        case 'cashier':
            if ($role === 'cashier') {
                return '<a href="' . url("reservation/approve/{$id}") . '" class="btn btn-sm btn-info">Record Payment</a>';
            }
            break;

        case 'ca':
            if ($role === 'ca') {
                return '
                    <a href="' . url("reservation/approve/{$id}") . '" class="btn btn-sm btn-success">Approve</a>
                    <a href="' . url("reservation/disapprove/{$id}") . '" class="btn btn-sm btn-danger">Disapprove</a>
                    <a href="' . url("reservation/revision/{$id}") . '" class="btn btn-sm btn-warning">Request Revision</a>';
            }
            break;

        case 'cfo':
            if ($role === 'cfo') {
                return '<a href="' . url("reservation/book/{$id}") . '" class="btn btn-sm btn-primary">Trigger Booking</a>';
            }
            break;
    }

    return ''; // No action available
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