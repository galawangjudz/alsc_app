<?php

class Dashboard extends Controller
{
    public function index()
    {
        AuthMiddleware::handle(); // Check if logged in
        $user = current_user();
        return $this->view('dashboard/index', ['user' => $user]);
    }

    public function notfound()
    {
        $this->view('404_page');
    }

}
