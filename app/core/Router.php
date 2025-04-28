<?php

class Router {

    private $routes = [];

    public function add($method, $route, $action) {
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'action' => $action
        ];
    }

    public function get($route, $action) {
        $this->add('GET', $route, $action);
    }

    public function post($route, $action) {
        $this->add('POST', $route, $action);
    }

    // This will match the current URL and execute the appropriate action
    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->match($url, $route['route'])) {
                // Call the controller and method dynamically
                $this->callAction($route['action']);
                return;
            }
        }

        // If no matching route found
        echo "404 Not Found";
    }

    private function match($url, $route) {
        // Simple matching: Replace dynamic segments with regex
        $route = preg_replace('/\(:num\)/', '(\d+)', $route);
        return preg_match("#^{$route}$#", $url);
    }

    private function callAction($action) {
        list($controller, $method) = explode('@', $action);
        
        // Assuming controllers are in the app/controllers directory
        require_once "app/controllers/{$controller}.php";
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
