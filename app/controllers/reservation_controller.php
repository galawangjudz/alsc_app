<?php
require_once __DIR__ . '/../models/Reservations.php';
require_once __DIR__ . '/../models/Projects.php';
require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/HouseModel.php';
require_once __DIR__ . '/../models/Agent.php';
require_once __DIR__ . '/../models/ApprovalLog.php';

class Reservation extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function index()
    {
        $reservations = Reservations::all();
        $approval_logs = Reservations::app_log();

        // Group logs by reservation ID
        $logs_by_reservation = [];
        foreach ($approval_logs as $log) {
            $logs_by_reservation[$log->id][] = $log;
        }

        // Attach logs to each reservation object
        foreach ($reservations as $res) {
            $res->approval_logs = $logs_by_reservation[$res->id] ?? [];
        }
        return $this->view('reservation/index', ['reservations' => $reservations]);
    }

    

    public function create()
    {
        // Fetch required data for creating an account (like agents, lots, buyers)
        $agents = Agent::all(); // Assuming you have an agent model
        $houses = House::all();
        $house_models = HouseModel::all();
        $projects = Projects::all(); 
        $lots = Lot::all_available(); // Assuming you have a lot model
        

        return $this->view('reservation/create', compact('projects','houses','house_models','agents', 'lots'));
    }

    // Handle the form submission for creating a new buyer account
    public function store()
    {
        // 1. Create the main buyers account record
        //echo "<pre>"; print_r($_POST); exit;
        $accountData = [
            'reservation_no' => $_POST['reservation_no'] ?? null,
            'account_no' => $_POST['account_no'] ?? null,
            'lot_id' => $_POST['lot_id'] ?? null,
            'date_of_sale' => $_POST['date_of_sale'] ?? date('Y-m-d'),
        
            'account_type' => $_POST['acc_type'],
            'account_type_secondary' => $_POST['acc_type_secondary'] ?? null,
        
            'lot_area' => $_POST['lot_area'] ?? null,
            'lot_price_per_sqm' => $_POST['lot_price_per_sqm'] ?? 0,
            'lot_discount_percent' => $_POST['lot_discount_percent'] ?? 0,
            'lot_discount_amount' => $_POST['lot_discount'] ?? 0,
        
            'house_model' => $_POST['house_model'] ?? null,
            'floor_area' => $_POST['floor_area'] ?? null,
            'house_price_per_sqm' => $_POST['house_price'] ?? 0,
            'house_discount_percent' => $_POST['house_discount_percent'] ?? 0,
            'house_discount_amount' => $_POST['house_discount'] ?? 0,
        
            'tcp_discount_percent' => $_POST['tcp_discount_percent'] ?? 0,
            'tcp_discount_amount' => $_POST['tcp_discount_amount'] ?? 0,
        
            'total_contract_price' => $_POST['lcp'] ?? null,
            'vat_amount' => $_POST['vat_amount'] ?? 0,
            'net_total_contract_price' => $_POST['net_lcp'] ?? $_POST['lcp'], // fallback
        
            'reservation_fee' => $_POST['reservation_fee'] ?? 0,
        
            'payment_type_primary' => $_POST['payment_type_primary'],
            'payment_type_secondary' => $_POST['payment_type_secondary'] ?? null,
        
            'down_payment_percent' => $_POST['down_payment_percent'] ?? 0,
            'net_down_payment' => $_POST['net_down_payment']?? 0,
        
            'number_of_payments' => $_POST['number_of_payments'] ?? null,
            'monthly_down_payment' => $_POST['monthly_down_payment'] ?? null,
            'first_down_payment_date' => $_POST['first_down_payment_date'] ?? null,
            'full_down_payment_due_date' => $_POST['full_down_payment_due_date'] ?? null,
        
            'amount_financed' => $_POST['amount_financed'] ?? 0,
            'financing_terms_months' => $_POST['term_months'],
            'interest_rate' => $_POST['interest_rate'] ?? 0,
            'fixed_factor' => $_POST['fixed_factor'] ?? 0,
            'monthly_amortization' => $_POST['monthly_amortization'] ?? 0,
            'amortization_start_date' => $_POST['amortization_start_date'] ?? null,
        
            'fence_cost' => $_POST['fence_cost'] ?? 0,
            'add_cost' => $_POST['add_cost'] ?? 0,        
        
            #'account_status' => 'Reservation', pag booked sale na
            'is_voided' => 0,
            'voided_by' => null,
            'void_reason' => null,
        ];
        $reservation = Reservations::create($accountData);

        if (isset($_POST['buyers']) && is_array($_POST['buyers'])) {
            foreach ($_POST['buyers'] as $index => $buyer) {
                if (!empty($buyer['first_name']) && !empty($buyer['last_name'])) {
                    Reservations::create_buyer([
                        'buyers_account_draft_id' => $reservation,
                        'last_name'         => $buyer['last_name'] ?? '',
                        'first_name'        => $buyer['first_name'] ?? '',
                        'contact_no'        => $buyer['contact_no'] ?? '',
                        'is_primary'        => $index === 0 ? 1 : 0, // Mark first buyer as primary
                    ]);
                }
            }
        }

        // 3. Save Agent Commissions (assumes data is sent as arrays: agent_ids[], commissions[])
        //echo "<pre>"; print_r($_POST); exit;
        if (isset($_POST['agents']) && is_array($_POST['agents'])) {
            foreach ($_POST['agents'] as $agentId) {
                Reservations::create_rsv_commission([
                    'buyers_account_draft_id' => $reservation,
                    'agent_id' => $agentId,
                    'commission_amount' => $_POST['agent_commission_amount'][$agentId] ?? 0,
                    'rate' => $_POST['agent_commission_rate'][$agentId] ?? 0,
                ]);
            }
        }

    
        ApprovalLog::log($reservation, 'agent', 'draft', current_user_id(),current_user_role());

        ActivityLog::log(current_user_id(), 'add', 'Reservation', "Draft created for {$reservation}");


        return $this->redirect("reservation/index");

    }

    public function delete($id)
    {
        if ($reservation->status !== 'draft') {
            return $this->view('error', ['message' => 'Deleting is allowed only in draft.']);
        }
        Reservations::delete_buyers($id);
        Reservations::delete_commissions($id);
        Reservations::delete_approval_logs($id);
        Reservations::delete($id);

        ActivityLog::log(current_user_id(), 'delete', 'Reservation', "Draft deleted for {$id}");
        return $this->view('reservation/index');
    }



    public function edit($id)
    {
        $reservation = Reservations::find($id);

        if ($reservation->status !== 'draft') {
            return $this->view('error', ['message' => 'Editing is allowed only in draft.']);
        }

        $buyers = Reservations::find_buyers($id);
        $agents = Reservations::find_agents($id);
        $projects = Projects::all();
        $lots = Lot::all_available();
        $houses = House::all();
        $house_models = HouseModel::all();
        $all_agents = Agent::all();
        //echo "<pre>";print_r($agents); exit;
        return $this->view('reservation/edit', compact('reservation','buyers','agents', 'projects', 'lots', 'houses', 'house_models', 'all_agents'));
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            // Handle missing ID
            die("Reservation ID is required for update.");
        }

        // 1. Prepare the updated reservation data
        $accountData = [
            'account_no' => $_POST['account_no'] ?? null,
            'lot_id' => $_POST['lot_id'] ?? null,
            'date_of_sale' => $_POST['date_of_sale'] ?? date('Y-m-d'),

            'account_type' => $_POST['acc_type'],
            'account_type_secondary' => $_POST['acc_type_secondary'] ?? null,

            'lot_area' => $_POST['lot_area'] ?? null,
            'lot_price_per_sqm' => $_POST['lot_price_per_sqm'] ?? 0,
            'lot_discount_percent' => $_POST['lot_discount_percent'] ?? 0,
            'lot_discount_amount' => $_POST['lot_discount'] ?? 0,

            'house_model' => $_POST['house_model'] ?? null,
            'floor_area' => $_POST['floor_area'] ?? null,
            'house_price_per_sqm' => $_POST['house_price'] ?? 0,
            'house_discount_percent' => $_POST['house_discount_percent'] ?? 0,
            'house_discount_amount' => $_POST['house_discount'] ?? 0,

            'tcp_discount_percent' => $_POST['tcp_discount_percent'] ?? 0,
            'tcp_discount_amount' => $_POST['tcp_discount_amount'] ?? 0,

            'total_contract_price' => $_POST['lcp'] ?? null,
            'vat_amount' => $_POST['vat_amount'] ?? 0,
            'net_total_contract_price' => $_POST['net_lcp'] ?? $_POST['lcp'],

            'reservation_fee' => $_POST['reservation_fee'] ?? 0,

            'payment_type_primary' => $_POST['payment_type_primary'],
            'payment_type_secondary' => $_POST['payment_type_secondary'] ?? null,

            'down_payment_percent' => $_POST['down_payment_percent'] ?? 0,
            'net_down_payment' => $_POST['net_down_payment'] ?? 0,

            'number_of_payments' => $_POST['number_of_payments'] ?? null,
            'monthly_down_payment' => $_POST['monthly_down_payment'] ?? null,
            'first_down_payment_date' => $_POST['first_down_payment_date'] ?? null,
            'full_down_payment_due_date' => $_POST['full_down_payment_due_date'] ?? null,

            'amount_financed' => $_POST['amount_financed'] ?? 0,
            'financing_terms_months' => $_POST['term_months'],
            'interest_rate' => $_POST['interest_rate'] ?? 0,
            'fixed_factor' => $_POST['fixed_factor'] ?? 0,
            'monthly_amortization' => $_POST['monthly_amortization'] ?? 0,
            'amortization_start_date' => $_POST['amortization_start_date'] ?? null,

            'fence_cost' => $_POST['fence_cost'] ?? 0,
            'add_cost' => $_POST['add_cost'] ?? 0,

            'is_voided' => 0,
            'voided_by' => null,
            'void_reason' => null,
        ];

        // 2. Update reservation record
        Reservations::update($id, $accountData);

        // 3. Update buyers — strategy: delete all then re-insert (or use an update strategy per record)
        Reservations::delete_buyers($id);
        if (isset($_POST['buyers']) && is_array($_POST['buyers'])) {
            foreach ($_POST['buyers'] as $index => $buyer) {
                if (!empty($buyer['first_name']) && !empty($buyer['last_name'])) {
                    Reservations::create_buyer([
                        'buyers_account_draft_id' => $id,
                        'last_name'         => $buyer['last_name'] ?? '',
                        'first_name'        => $buyer['first_name'] ?? '',
                        'contact_no'        => $buyer['contact_no'] ?? '',
                        'is_primary'        => $index === 0 ? 1 : 0,
                    ]);
                }
            }
        }

        // 4. Update agent commissions — delete then re-insert
        Reservations::delete_commissions($id);
        if (isset($_POST['agents']) && is_array($_POST['agents'])) {
            foreach ($_POST['agents'] as $agentId) {
                Reservations::create_rsv_commission([
                    'buyers_account_draft_id' => $id,
                    'agent_id' => $agentId,
                    'commission_amount' => $_POST['agent_commission_amount'][$agentId] ?? 0,
                    'rate' => $_POST['agent_commission_rate'][$agentId] ?? 0,
                ]);
            }
        }

        ApprovalLog::log($id, 'agent', 'edited', current_user_id(), current_user_role());
        ActivityLog::log(current_user_id(), 'update', 'Reservation', "Draft updated for {$id}");

        return $this->redirect("reservation/index");
    }


    public function validateReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'validated';
        $reservation->current_step = 'sales';
        $reservation->save();

        ApprovalLog::log($id, 'sales', 'validated', current_user_id(), 'Validated by sales');
        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Validated reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function void($id)
    {
        $reservation = Reservations::find($id);
        $reservation->is_voided = true;
        $reservation->voided_by = current_user_id();
        $reservation->void_reason = $_POST['reason'] ?? 'No reason';
        $reservation->voided_at = date('Y-m-d H:i:s');
        $reservation->status = 'voided';
        $reservation->save();

        ApprovalLog::log($id, $reservation->current_step, 'voided', current_user_id(), $reservation->void_reason);
        return $this->redirect("reservation/view/{$id}");
    }

    public function approve($id)
    {
        $reservation = Reservations::find($id);

        switch ($reservation->current_step) {
            case 'coo':
                $reservation->status = 'approved_coo';
                $reservation->current_step = 'cashier';
                break;
            case 'credit_assessment':
                $reservation->status = 'approved_ca';
                $reservation->current_step = 'cfo';
                break;
            case 'cfo':
                $reservation->status = 'approved_cfo';
                $reservation->current_step = 'final';
                break;
        }

        $reservation->save();
        ApprovalLog::log($id, $reservation->current_step, 'approved', current_user_id());
        return $this->redirect('reservation/view/' . $id);
    }

    public function disapprove($id)
    {
        $reservation = Reservations::find($id);

        switch ($reservation->current_step) {
            case 'coo':
                $reservation->status = 'disapproved_coo';
                $reservation->current_step = 'agent';
                $reservation->approval_cycle += 1;
                break;
            case 'credit_assessment':
                $reservation->status = 'disapproved_ca';
                $reservation->current_step = 'agent';
                $reservation->approval_cycle += 1;
                break;
        }

        $reservation->save();
        ApprovalLog::log($id, $reservation->current_step, 'disapproved', current_user_id());
        return $this->redirect("reservation/view/{$id}");
    }

    public function book($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'booked';
        $reservation->current_step = 'final';
        $reservation->save();

        $reservation->lot->update(['available' => false]);

        ApprovalLog::log($reservation->id, 'cfo', 'booked', current_user_id(), 'Booking triggered by CFO');

        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Booked reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function show($id)
    {
        $reservation = Reservations::find($id);

        if (!$reservation) {
            // Handle the case when reservation is not found
            return $this->view('reservation/not_found');
        }

        $buyers = Reservations::find_co_buyers($id);
        $agents = Reservations::find_agents($id);
       
        //echo "<pre>";print_r($agents); exit;
        return $this->view('reservation/view',compact('reservation', 'buyers', 'agents'));
    }


    public function generatePDF($id)
    {
        $reservation = Reservations::find($id);
        $pdfHelper = new PDFHelper();
        return $pdfHelper->generateReservationPDF($reservation);
    }

    public function notfound()
    {
        $this->view('404_page');
    }
}
