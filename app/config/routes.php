<?php
// /app/config/routes.php

use alsc_app\app\controllers\AuthController;
use alsc_app\app\controllers\DashboardController;
use alsc_app\app\controllers\PermissionsController;
use alsc_app\app\controllers\UsersController;

// Example of defining your routes
$router->get('/register', 'AuthController@register'); // Show registration form
$router->post('/register', 'AuthController@register'); // Handle registration
$router->get('/login', 'AuthController@login'); // Show login form
$router->post('/login', 'AuthController@login'); // Handle login submission
$router->get('/logout', 'AuthController@logout'); // Logout user
// Add this check at the top of your controller methods that need authentication
AuthMiddleware::checkAuth();

// Example of a protected route (Dashboard)
$router->get('/dashboard', 'DashboardController@index');
?>