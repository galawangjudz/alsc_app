<?php
require_once __DIR__ . '/../models/BuyersAccountModel.php';
require_once __DIR__ . '/../models/AgentCommissionModel.php';
require_once __DIR__ . '/../core/Controller.php';

class BuyersAccount extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    // Display all buyer accounts
    public function index()
    {
        // Fetch all buyer accounts
        $accounts = BuyersAccountModel::all();
        
        // Pass the accounts to the view
        return $this->view('buyers_account/index', compact('accounts'));
    }

    // Display details for a single buyer account
    public function show($account_no)
    {
        // Fetch the buyer account with related buyer, lot, and agent commission
        $account = BuyersAccountModel::find($account_no);
        $commissions = AgentCommissionModel::findByAccount($account_no);

        if (!$account) {
            // Handle the case when account is not found
            return $this->view('buyers_account/not_found');
        }

        // Pass account details and commissions to the view
        return $this->view('buyers_account/show', compact('account', 'commissions'));
    }

    // Show the form for creating a new buyer account
    public function create()
    {
        // Fetch required data for creating an account (like agents, lots, buyers)
        $agents = AgentModel::all(); // Assuming you have an agent model
        $lots = LotModel::all(); // Assuming you have a lot model
        $buyers = BuyerModel::all(); // Assuming you have a buyer model

        return $this->view('buyers_account/create', compact('agents', 'lots', 'buyers'));
    }

    // Handle the form submission for creating a new buyer account
    public function store()
    {
        $data = [
            'lot_id' => $_POST['lot_id'],
            'primary_buyer_id' => $_POST['primary_buyer_id'],
            'agent_id' => $_POST['agent_id'],
            'property_id' => $_POST['property_id'],
            'date_of_sale' => $_POST['date_of_sale'],
            'account_status' => $_POST['account_status'],
            // Add all other fields as needed...
        ];

        $account = BuyersAccountModel::create($data);

        // Redirect to the buyer accounts index page
        return $this->redirect('/buyers_account');
    }

    // Show the form to edit an existing buyer account
    public function edit($account_no)
    {
        $account = BuyersAccountModel::find($account_no);

        if (!$account) {
            // Handle the case when account is not found
            return $this->view('buyers_account/not_found');
        }

        // Fetch required data for editing (like agents, lots, buyers)
        $agents = AgentModel::all();
        $lots = LotModel::all();
        $buyers = BuyerModel::all();

        return $this->view('buyers_account/edit', compact('account', 'agents', 'lots', 'buyers'));
    }

    // Handle the form submission for updating a buyer account
    public function update($account_no)
    {
        $data = [
            'account_status' => $_POST['account_status'],
            // Include other fields to update...
        ];

        $account = BuyersAccountModel::update($account_no, $data);

        // Redirect to the show page for the updated account
        return $this->redirect('/buyers_account/show/' . $account_no);
    }
}
