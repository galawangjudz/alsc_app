<?php

require_once __DIR__ . '/../models/Agent.php';

class AdminAgent extends Controller
{
    public function __construct()
    {
        AdminMiddleware::handle();
    }

    public function index()
    {
        $agents = Agent::all();
        return $this->view('admin/agents/index', ['agents' => $agents]);
    }

    public function create()
    {
        return $this->view('admin/agents/create');
    }

    public function store()
    {
        $data = $_POST;
        Agent::insert($data);
        ActivityLog::log(current_user_id(), 'add', 'Agent', 'Added agent with code ' . $data['c_code']); 

        return $this->redirect('adminagent/index');
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        return $this->view('admin/agents/edit', ['agent' => $agent]);
    }

    public function update($id)
    {
        $data = $_POST;
        Agent::update($id, $data);
        ActivityLog::log(current_user_id(), 'update', 'Agent', 'Updated agent id ' . $id);
        return $this->redirect('adminagent/index');
    }

    public function delete($id)
    {
        Agent::delete($id);
        ActivityLog::log(current_user_id(), 'delete', 'Agent', 'Deleted agent id ' . $id);
        return $this->redirect('adminagent/index');
    }

    public function notfound()
    {
        $this->view('404_page');
    }
}
