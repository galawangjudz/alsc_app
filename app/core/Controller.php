<?php

class Controller
{
    protected function model($model)
    {
        require_once(__DIR__ . '/../models/' . $model . '.php');
        return new $model();
    }

    protected function view($view, $data = [])
    {
        extract($data); // This makes keys in $data available as variables
        require_once (__DIR__ . '/../views/' . $view . '.php');
    }

    protected function redirect($url)
    {
        // Ensure URL is relative to the base URL
        header("Location: /alsc_app/$url");  // Assuming your base URL is '/alsc_app/'
        exit();  // Ensure no further code is executed
    }
}
