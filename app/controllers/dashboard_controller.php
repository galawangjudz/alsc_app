<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/ActivityLog.php';
class Dashboard extends Controller
{
    public function index()
    {
        AuthMiddleware::handle(); // Check if logged in
        $user = current_user();
        #return $this->view('dashboard/index', ['user' => $user]);
       
        // Prepare data for the view
        $data = [
            'view' => 'dashboard/index',  // Path to the view you want to render
            'user' => $user,              // User data to be passed to the view
            'title' => 'Dashboard'        // Page title
        ];
        $totalUsers =   User::getTotalUsers();// Replace with real DB query
        // Recent Activity Logs
        $activityLogs = ActivityLog::recent_logs(); // Replace with real DB query
    
        // Data for the view
        $data = [
            'user' => $user,
            'title' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'activityLogs' => $activityLogs,
        ];

        // Render the layout with the page-specific content
        $this->view('dashboard/index', $data, 'layouts/main');

    }

    public function notfound()
    {
        $this->view('404_page');
    }

}
