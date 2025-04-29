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
}
