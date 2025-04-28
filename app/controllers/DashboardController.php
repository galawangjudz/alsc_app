<?php

class DashboardController extends Controller {

    public function index() {
        // Ensure the user is logged in before accessing the dashboard
        AuthMiddleware::checkAuth();

        // Get the logged-in user's data
        $userId = $_SESSION['user_id'];
        $userModel = new User();
        $user = $userModel->getUserById($userId);

        // Render the dashboard view and pass the user data
        $this->view->render('dashboard/index', ['user' => $user]);
    }
}
