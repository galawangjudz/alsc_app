<?php

class Controller
{
    protected function model($model)
    {
        require_once(__DIR__ . '/../models/' . $model . '.php');
        return new $model();
    }

    protected function view_old($view, $data = [])
    {
        extract($data); // This makes keys in $data available as variables
        require_once (__DIR__ . '/../views/' . $view . '.php');
    }

    // In Controller.php
    protected function view($view, $data = [], $layout = 'layouts/main')
    {
        extract($data);  // Extract data to make it available as variables
        
        // Capture the content of the specific view
        ob_start();
        require_once(__DIR__ . '/../views/' . $view . '.php');
        $content = ob_get_clean();  // Capture the output of the view
        
        // Check if a layout is passed (default is 'layouts/main')
        if ($layout) {
            // Now, load the layout with dynamic content
            require_once(__DIR__ . '/../views/' . $layout . '.php');
        } else {
            // If no layout, just echo the content
            echo $content;
        }
    }

    protected function redirect($url)
    {
        // Ensure URL is relative to the base URL
        header("Location: /alsc_app/$url");  // Assuming your base URL is '/alsc_app/'
        exit();  // Ensure no further code is executed
    }
}
