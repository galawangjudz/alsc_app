<?php
require_once __DIR__ . '/../models/BuyersAccountModel.php';
require_once __DIR__ . '/../models/BuyersAccountBuyersModel.php';
require_once __DIR__ . '/../models/Projects.php';
require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/HouseModel.php';
require_once __DIR__ . '/../models/Agent.php';
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
        $co_buyers = BuyersAccountBuyersModel::co_buyers($account_no);
        $commissions = AgentCommissionModel::findByAccount($account_no);
       

        if (!$account) {
            // Handle the case when account is not found
            return $this->view('buyers_account/not_found');
        }

        // Pass account details and commissions to the view
        return $this->view('buyers_account/show', compact('account','co_buyers', 'commissions'));
    }

    // Show the form for creating a new buyer account
    public function create()
    {
        // Fetch required data for creating an account (like agents, lots, buyers)
        $agents = Agent::all(); // Assuming you have an agent model
        $houses = House::all();
        $house_models = HouseModel::all();
        $projects = Projects::all(); 
        $lots = Lot::all_available(); // Assuming you have a lot model
        

        return $this->view('buyers_account/manage', compact('projects','houses','house_models','agents', 'lots'));
    }

    // Handle the form submission for creating a new buyer account
    public function store()
    {
        // 1. Create the main buyers account record
        $accountData = [
            'lot_id' => $_POST['lot_id'],
            'acc_type' => $_POST['acc_type'],
            'house_id' => $_POST['house_id'] ?? null,
            'house_model' => $_POST['house_model'] ?? null,
            'house_price' => $_POST['house_price'] ?? null,
            'lot_area' => $_POST['lot_area'],
            'lot_amount' => $_POST['lot_amount'],
            'lot_discount' => $_POST['lot_discount'],
            'lcp' => $_POST['lcp'],
            'floor_area' => $_POST['floor_area'] ?? null,
            'house_discount' => $_POST['house_discount'] ?? null,
            'fence_cost' => $_POST['fence_cost'] ?? null,
            'add_cost' => $_POST['add_cost'] ?? null,
            'add_cost_details' => $_POST['add_cost_details'] ?? null,
            'payment_type_primary' => $_POST['payment_type_primary'],
            'payment_type_secondary' => $_POST['payment_type_secondary'],
            'down_payment' => $_POST['down_payment'],
            'term_months' => $_POST['term_months'],
            'account_status' => 'Reservation', // or whatever default
            'date_of_sale' => date('Y-m-d'), // or from input if needed
        ];

        $account_no = BuyersAccountModel::create($accountData);
        
        if (isset($_POST['buyers']) && is_array($_POST['buyers'])) {
            foreach ($_POST['buyers'] as $index => $buyer) {
                if (!empty($buyer['first_name']) && !empty($buyer['last_name'])) {
                    BuyersAccountBuyersModel::create([
                        'buyers_account_no' => $account_no,
                        'last_name'         => $buyer['last_name'] ?? '',
                        'first_name'        => $buyer['first_name'] ?? '',
                        'contact_no'        => $buyer['contact_no'] ?? '',
                        'is_primary'        => $index === 0 ? 1 : 0, // Mark first buyer as primary
                    ]);
                }
            }
        }

        // 3. Save Agent Commissions (assumes data is sent as arrays: agent_ids[], commissions[])
        if (isset($_POST['agent_ids']) && is_array($_POST['agent_ids'])) {
            foreach ($_POST['agent_ids'] as $index => $agentId) {
                AgentCommissionModel::create([
                    'buyers_account_no' => $account_no,
                    'agent_id' => $agentId,
                    'commission_percent' => $_POST['commission_percents'][$index] ?? 0,
                ]);
            }
        }
        //Lot Status change to sold
        $lotstatus = [
            'status' => 'Sold'
        ];
        Lot::where($_POST['lot_id'],$lotstatus);

        return $this->redirect('buyers_account/index');
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
