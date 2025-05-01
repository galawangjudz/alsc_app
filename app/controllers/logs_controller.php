<?php



class Logs extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle(); // Only admins
    }

    public function index()
    {
        $logs = ActivityLog::all();
        return $this->view('admin/activity_logs/index', ['logs' => $logs]);
    }
}
