<?php

require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/Fence.php';
require_once __DIR__ . '/../models/AdditionalCost.php';
require_once __DIR__ . '/../core/Controller.php'; // Assuming you have a base Controller class

class Inventory extends Controller
{
    public function index()
    {
        AuthMiddleware::handle();
        $search = $_GET['q'] ?? '';
        $lots = Lot::search($search); // Assume this method handles both all and filtered search
        return $this->view('inventory/index', ['inventory' => $lots]);
    }


    
    public function save_lot()
    {
        AuthMiddleware::handle();

        $data = $_POST;
        if (!empty($data['id'])) {
            Lot::update($data['id'], $data);
        } else {
            $data['id'] = Lot::insert($data);
        }

        header('Location: ' . url('inventory/manage/' . $data['id']));
        exit;
    }
  
    public function delete_lot($id)
    {
        // Check if the lot exists
        $lot = Lot::find($id);
        if ($lot) {
            // First delete related records in the dependent tables
            AdditionalCost::delete($id);  // Delete additional costs associated with this lot
            Fence::delete($id);           // Delete fences associated with this lot
            House::delete($id);           // Delete houses associated with this lot
            // Now delete the lot itself
            Lot::delete($id);
        }

        header('Location: ' . url('inventory/index'));
        exit;
    }

    public function save_house()
    {
        AuthMiddleware::handle();

        $data = $_POST;
        $existing = House::findByLot($data['lot_id']);

        if ($existing) {
            House::update($existing->id, $data);
        } else {
            House::insert($data);
        }

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function add_fence()
    {
        AuthMiddleware::handle();

        $data = $_POST;
        Fence::insert($data);

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function delete_fence($id)
    {
        AuthMiddleware::handle();

        $fence = Fence::find($id);
        if ($fence) {
            Fence::delete($id);
            header('Location: ' . url('inventory/manage/' . $fence->lot_id));
        } else {
            header('Location: ' . url('inventory/index'));
        }
        exit;
    }

    public function add_cost()
    {
        AuthMiddleware::handle();

        $data = $_POST;
        AdditionalCost::insert($data);

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function delete_cost($id)
    {
        AuthMiddleware::handle();

        $cost = AdditionalCost::find($id);
        if ($cost) {
            AdditionalCost::delete($id);
            header('Location: ' . url('inventory/manage/' . $cost->lot_id));
        } else {
            header('Location: ' . url('inventory/index'));
        }
        exit;
    }


    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = $_POST['query'];
            $lots = Lot::search($query);
            return $this->view('inventory/search_results', ['lots' => $lots]);
        } else {
            return $this->view('inventory/search');
        }
    }

    public function manage($id = null)
    {
        AuthMiddleware::handle();

        $lot = $id ? Lot::find($id) : null;
        $house = $lot ? House::findByLot($id) : null;
        $fences = $lot ? Fence::where('lot_id', $id) : [];
        $costs = $lot ? AdditionalCost::where('lot_id', $id) : [];

        return $this->view('inventory/manage', compact('lot', 'house', 'fences', 'costs'));
    }


    

  

}