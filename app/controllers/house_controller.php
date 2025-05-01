<?php

class HouseController extends Controller
{
    public function index()
    {
        AuthMiddleware::handle();
        $houses = House::all();
        return $this->view('house/index', ['houses' => $houses]);
    }

    public function create()
    {
        AuthMiddleware::handle();
        $lots = Lot::all(); // If you want to associate house to lot
        return $this->view('house/create', ['lots' => $lots]);
    }

    public function store()
    {
        AuthMiddleware::handle();

        $data = [
            'lot_id' => $_POST['lot_id'],
            'name' => $_POST['name'],
            'type' => $_POST['type'],
            'status' => $_POST['status'],
        ];

        House::insert($data);
        set_flash('House added successfully!');
        redirect('house/index');
    }

    public function show($id)
    {
        AuthMiddleware::handle();
        $house = House::find($id);
        return $this->view('house/show', ['house' => $house]);
    }

    public function edit($id)
    {
        AuthMiddleware::handle();
        $house = House::find($id);
        $lots = Lot::all();
        return $this->view('house/edit', ['house' => $house, 'lots' => $lots]);
    }

    public function update($id)
    {
        AuthMiddleware::handle();

        $data = [
            'lot_id' => $_POST['lot_id'],
            'name' => $_POST['name'],
            'type' => $_POST['type'],
            'status' => $_POST['status'],
        ];

        House::update($id, $data);
        set_flash('House updated successfully!');
        redirect('house/index');
    }

    public function delete($id)
    {
        AuthMiddleware::handle();
        House::delete($id);
        set_flash('House deleted.');
        redirect('house/index');
    }
}
