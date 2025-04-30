<?php

require_once 'config/Config.php';
require_once 'config/Connection.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'middleware/AuthMiddleware.php';
require_once 'middleware/AdminMiddleware.php';
require_once 'middleware/PermissionMiddleware.php';
require_once 'utils/Functions.php';
require_once 'helpers/activity_helper.php';


function url($path = '')
{
    $base = rtrim('/alsc_app', '/'); 
    $path = ltrim($path, '/');
    return $base . '/?url=' . $path;
}