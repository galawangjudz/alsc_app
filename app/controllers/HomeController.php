<?php
namespace alsc_app\app\controllers;

class HomeController {

    // Default landing page
    public function index() {
        // You can return a simple view or redirect as needed
        include '../app/views/home.php';  // Render a home page view
    }
}
