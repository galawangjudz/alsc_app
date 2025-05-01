<?php 

class Lot extends Controller
{
    public function index()
    {
        AuthMiddleware::handle();
        $lots = Lot::all();
        return $this->view('inventory/lots/index', ['lots' => $lots]);
        
    }

    public function create()
    {
        AuthMiddleware::handle();
        return $this->view('inventory/lots/create');
    }

    public function store()
    {
        AuthMiddleware::handle();

        Lot::insert([
            'block_number' => $_POST['block_number'],
            'lot_number'   => $_POST['lot_number'],
            'area'         => $_POST['area'],
            'status'       => $_POST['status']
        ]);

        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Lot added successfully.'];
        redirect('lot/index');
    }
}