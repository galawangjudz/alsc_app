<?php

session_start();
require_once '../vendor/autoload.php';
require_once '../app/core/Router.php';

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, '/');

$router = new Router();

//require_once '../app/config/routes.php';
// Define routes
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/dashboard', 'DashboardController@index');
$router->dispatch();
