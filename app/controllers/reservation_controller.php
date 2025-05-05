<?php
require_once __DIR__ . '/../models/Reservations.php';
require_once __DIR__ . '/../models/Projects.php';
require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/Agent.php';
#require_once __DIR__ . '/../helpers/PDFHelper.php';

class Reservation extends Controller
{
    public function __construct()
    {
        // Any necessary middleware can be added here
        // AdminMiddleware::handle();
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
        $agents = Agent::all();
        return $this->view('reservation/create', ['projects' => $projects, 'lots' => $lots, 'houses' => $houses, 'agents' => $agents]);
    }

    public function edit($id)
    {
        $reservation = Reservations::find($id);
        $lots = Lot::all_available();
        $houses = House::all();
        $agents = Agent::all();
        return $this->view('reservation/edit', compact('reservation', 'lots', 'houses', 'agents'));
    }

    public function store()
    {
        $data = $_POST;
        
        // You can add validation here, or delegate to a separate method
        $reservation = Reservations::create($data);

        // Attach agents to the reservation
        foreach ($data['agents'] as $agent_id) {
            $reservation->attachAgent($agent_id);
        }

        ActivityLog::log(current_user_id(), 'add', 'Reservation', 'Added reservation for ' . $data['buyer1_name']);
        return $this->redirect('reservation/view/' . $reservation->id);
    }

    public function update($id)
    {
        $data = $_POST;
        Reservations::update($id, $data);
        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Updated reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function show($id)
    {
        $reservation = Reservations::find($id);
        return $this->view('reservation/view', ['reservation' => $reservation]);
    }

    public function generatePDF($id)
    {
        $reservation = Reservations::find($id);
        $pdfHelper = new PDFHelper();
        return $pdfHelper->generateReservationPDF($reservation);
    }

    public function validateReservation($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'validated';
        $reservation->save();
        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Validated reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function approve($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'approved';
        $reservation->save();
        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Approved reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function book($id)
    {
        $reservation = Reservations::find($id);
        $reservation->status = 'booked';
        $reservation->save();
        $reservation->lot->update(['available' => false]);
        ActivityLog::log(current_user_id(), 'update', 'Reservation', 'Booked reservation ID ' . $id);
        return $this->redirect('reservation/view/' . $id);
    }

    public function notfound()
    {
        $this->view('404_page');
    }
}
