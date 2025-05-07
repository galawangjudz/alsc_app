<?php
require_once __DIR__ . '/../models/Projects.php';
require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/HouseModel.php';
require_once __DIR__ . '/../models/Fence.php';
require_once __DIR__ . '/../models/AdditionalCost.php';
require_once __DIR__ . '/../core/Controller.php'; // Assuming you have a base Controller class

class Inventory extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle(); // Run this once on every controller method call
    }

    public function index()
    {
        $search = $_GET['q'] ?? '';
        $lots = Lot::search($search);
        $projects = Projects::all();
        return $this->view('inventory/index', ['inventory' => $lots,'projects'=> $projects]);
    }

    public function model_house()
    {
        $model_houses = HouseModel::all();
        return $this->view('inventory/model_house/index', ['model_houses' => $model_houses]);
    }

    public function model_house_delete($id)
    {
        $userId = current_user_id();
        HouseModel::delete($id);
        ActivityLog::log($userId, 'delete', 'Model House', 'Deleted Model House ID ' . $id);
        header('Location: ' . url('inventory/model_house/index'));
        exit;
    }

    public function model_house_manage($id = null)
    {
        $model_house = $id ? HouseModel::find($id) : null;
        return $this->view('inventory/model_house/manage',['model_house' => $model_house]);
    }

    public function save_model_house()
    {
        $data = $_POST;
        $userId = current_user_id();

        if (!empty($data['id'])) {
            HouseModel::update($data['id'], $data);
            ActivityLog::log($userId, 'update', 'Model House', 'Model House ID ' . $data['id']);
            Notification::send('10093', 'House Model #' . $data['c_model'] . ' was updated by ' .  $_SESSION['user']['name']);
        } else {
            $data['id'] = HouseModel::insert($data);
            ActivityLog::log($userId, 'create', 'Lot', 'Created new model house with number ' . $data['lot']);
            Notification::send('10093', 'New lot #' . $data['c_model'] . ' added by ' .  $_SESSION['user']['name']);
        }

        header('Location: ' . url('inventory/model_house/index' . $data['id']));
        exit;
    }

    public function save_lot()
    {
        $data = $_POST;
        $userId = current_user_id();

        if (!empty($data['id'])) {
            Lot::update($data['id'], $data);
            ActivityLog::log($userId, 'update', 'Lot', 'Updated lot ID ' . $data['id']);
            Notification::send('10093', 'Lot #' . $data['id'] . ' was updated by ' .  $_SESSION['user']['name']);
        } else {
            $data['id'] = Lot::insert($data);
            ActivityLog::log($userId, 'create', 'Lot', 'Created new lot with number ' . $data['lot']);
            Notification::send('10093', 'New lot #' . $data['id'] . ' added by ' .  $_SESSION['user']['name']);
        }

        header('Location: ' . url('inventory/manage/' . $data['id']));
        exit;
    }

    public function delete_lot($id)
    {
        $userId = current_user_id();
        $lot = Lot::find($id);
        if ($lot) {
            AdditionalCost::delete($id);
            Fence::delete($id);
            House::delete($id);
            Lot::delete($id);

            ActivityLog::log($userId, 'delete', 'Lot', 'Deleted lot ID ' . $id);
        }

        header('Location: ' . url('inventory/index'));
        exit;
    }

    public function save_house()
    {
        $data = $_POST;
        $userId = current_user_id();
        $existing = House::findByLot($data['lot_id']);

        if ($existing) {
            House::update($existing->id, $data);
            ActivityLog::log($userId, 'update', 'House', 'Updated house on lot ID ' . $data['lot_id']);
        } else {
            House::insert($data);
            ActivityLog::log($userId, 'create', 'House', 'Added house to lot ID ' . $data['lot_id']);
        }

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function add_fence()
    {
        $data = $_POST;
        Fence::insert($data);

        ActivityLog::log(current_user_id(), 'create', 'Fence', 'Added fence to lot ID ' . $data['lot_id']);

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function delete_fence($id)
    {
        $fence = Fence::find($id);
        if ($fence) {
            Fence::delete($id);
            ActivityLog::log(current_user_id(), 'delete', 'Fence', 'Deleted fence ID ' . $id);
            header('Location: ' . url('inventory/manage/' . $fence->lot_id));
        } else {
            header('Location: ' . url('inventory/index'));
        }
        exit;
    }

    public function add_cost()
    {
        $data = $_POST;
        AdditionalCost::insert($data);

        ActivityLog::log(current_user_id(), 'create', 'AdditionalCost', 'Added cost to lot ID ' . $data['lot_id']);

        header('Location: ' . url('inventory/manage/' . $data['lot_id']));
        exit;
    }

    public function delete_cost($id)
    {
        $cost = AdditionalCost::find($id);
        if ($cost) {
            AdditionalCost::delete($id);
            ActivityLog::log(current_user_id(), 'delete', 'AdditionalCost', 'Deleted cost ID ' . $id);
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
        $lot = $id ? Lot::find($id) : null;
        $house = $lot ? House::findByLot($id) : null;
        $fences = $lot ? Fence::where('lot_id', $id) : [];
        $costs = $lot ? AdditionalCost::where('lot_id', $id) : [];
        $projects = Projects::all();
        return $this->view('inventory/manage', compact('lot', 'house', 'fences', 'costs','projects'));
    }
}

