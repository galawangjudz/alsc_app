<?php

require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/BuyersAccountModel.php';

class payments extends Controller
{
    public function __construct()
    {
        AuthMiddleware::handle();
    }

    public function list($account_no)
    {
        $payments = Payment::forAccount($account_no);
        return $this->view('payments/index', ['payments' => $payments, 'account_no' => $account_no]);
    }

    public function create($account_no)
    {
        return $this->view('payments/create', ['account_no' => $account_no]);
    }

    public function store()
    {
        $data = $_POST;
        Payment::insert($data);
        ActivityLog::log(current_user_id(), 'add', 'Payment', 'Added payment for account ' . $data['account_no']);

        return $this->redirect('payments/list/' . $data['account_no']);
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        return $this->view('payments/edit', ['payment' => $payment]);
    }

    public function update($id)
    {
        $data = $_POST;
        Payment::update($id, $data);
        ActivityLog::log(current_user_id(), 'update', 'Payment', 'Updated payment ID ' . $id);

        return $this->redirect('payments/list/' . $data['account_no']);
    }

    public function delete($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            Payment::delete($id);
            ActivityLog::log(current_user_id(), 'delete', 'Payment', 'Deleted payment ID ' . $id);
            return $this->redirect('payments/list/' . $payment->account_no);
        }
        return $this->view('404_page');
    }
}
