<?php

session_start();
require_once '../vendor/autoload.php';
require_once '../app/core/Router.php';

$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, '/');


// Initialize the Router
$router = new Router();

$router->get('/', 'alsc_app\app\controllers\HomeController@index');  // Default landing page

$router->get('/register', 'alsc_app\app\controllers\AuthController@register');
$router->post('/register', 'alsc_app\app\controllers\AuthController@register');
$router->get('/login', 'alsc_app\app\controllers\AuthController@login');
$router->post('/login', 'alsc_app\app\controllers\AuthController@login');
$router->get('/logout', 'alsc_app\app\controllers\AuthController@logout');
$router->get('/dashboard', 'alsc_app\app\controllers\DashboardController@index');


// Dispatch the router to handle the request
$router->run();
