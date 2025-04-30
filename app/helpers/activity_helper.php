<?php
require_once __DIR__ . '/../models/ActivityLog.php';

function log_activity($action, $module, $description = '')
{
    $user_id = $_SESSION['user']['employee_id'] ?? null;
    ActivityLog::log($user_id, $action, $module, $description);
}


function current_user_id() {
    return $_SESSION['user']['employee_id'] ?? null;
}