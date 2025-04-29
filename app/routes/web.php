<?php

$router->get('/login', 'AuthController@showLoginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/admin/users', 'AdminController@index');
$router->post('/admin/assign-role', 'AdminController@assignRole');
