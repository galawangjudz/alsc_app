<?php
require_once __DIR__ . '/../models/AgentCommissionModel.php';
require_once __DIR__ . '/../models/BuyersAccountModel.php';
require_once __DIR__ . '/../core/Controller.php';

class AgentCommission extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index()
    {
        // Fetch all the agent commissions
        $commissions = AgentCommissionModel::all();
        
        // Pass the commissions to the view
        return $this->view('agent_commission/index', compact('commissions'));
    }

    public function show($account_no)
    {
        // Fetch the agent commission for a particular buyer account
        $commission = AgentCommissionModel::findByAccount($account_no);

        if (!$commission) {
            // Handle case where commission not found
            return $this->view('agent_commission/not_found');
        }

        // Pass commission data to the view
        return $this->view('agent_commission/show', compact('commission'));
    }

    public function create()
    {
        // Placeholder for creating a new agent commission
        return $this->view('agent_commission/create');
    }

    public function store()
    {
        // Store the new agent commission (you would handle POST data here)
        $data = [
            'account_no' => $_POST['account_no'],
            'agent_id' => $_POST['agent_id'],
            'commission_amount' => $_POST['commission_amount'],
            'paid' => $_POST['paid'],
        ];

        $commission = AgentCommissionModel::create($data);

        // Redirect to the commission index or show page
        return $this->redirect('/agent_commission');
    }
}
