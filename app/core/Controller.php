<?php

class Controller {
    protected $view;
    protected $model;

    public function __construct($model = null) {
        $this->view = new View();
        $this->model = $model;
    }
}
