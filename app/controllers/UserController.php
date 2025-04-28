<?php
// /app/controllers/UserController.php

require_once '../app/models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->user = new User($this->db);
    }

    public function register($username, $password) {
        return $this->user->create($username, $password);
    }

    public function login($username, $password) {
        return $this->user->login($username, $password);
    }
}