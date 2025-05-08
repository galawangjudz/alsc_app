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
        return $this->view('reservation/index', ['reservations' => $reservations]);
    }

    public function create()
    {
        $projects = Projects::all();
        $lots = Lot::all_available();
        $houses = House::all();
        $house_models = HouseModel::all();
        $agents = Agent::all();
        return $this->view('reservation/create', compact('projects', 'lots', 'houses', 'house_models', 'agents'));
    }

    public function store()
    {
        $data = $_POST;

        // Create the reservation draft
        $reservation = Reservations::create($data);

        // Attach buyers
        foreach ($data['buyers'] as $index => $buyer_id) {
            $is_primary = ($index === 0);
            $reservation->attachBuyer($buyer_id, $is_primary);
        }

        // Attach agents with commission
        foreach ($data['agents'] as $agent_data) {
            $reservation->attachAgent(
                $agent_data['agent_id'],
                $agent_data['commission_percent'],
                $agent_data['commission_amount']
            );
        }

        // Log draft creation
        ApprovalLog::log($reservation->id, 'agent', 'draft', current_user_id());

        ActivityLog::log(current_user_id(), 'add', 'Reservation', "Draft created for {$data['account_no']}");
        return $this->redirect("reservation/view/{$reservation->id}");
    }

    public function edit($id)
    {
        $reservation = Reservations::find($id);

        if ($reservation->status !== 'draft') {
            return $this->view('error', ['message' => 'Editing is allowed only in draft.']);
        }

        $projects = Projects::all();
        $lots = Lot::all_available();
        $houses = House::all();
        $house_models = HouseModel::all();
        $agents = Agent::all();
        return $this->view('reservation/edit', compact('reservation', 'projects', 'lots', 'houses', 'house_models', 'agents'));
    }

    public function update($id)
    {
        $data = $_POST;
        $reservation = Reservations::find($id);

        if ($reservation->status !== 'draft') {
            return $this->view('error', ['message' => 'Only draft reservations can be updated.']);
        }

        $reservation->update($data);

        ActivityLog::log(current_user_id(), 'update', 'Reservation', "Updated draft ID {$id}");
        return $this->redirect("reservation/view/{$id}");
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
        $approval_logs = ApprovalLog::forReservation($id);
        return $this->view('reservation/view', compact('reservation', 'approval_logs'));
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
