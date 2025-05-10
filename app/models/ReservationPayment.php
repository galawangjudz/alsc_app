<?php
require_once __DIR__ . '/../core/Model.php';

class ReservationPayment extends Model
{
    protected $table = 'reservations_payment';

    public static function getTotalPaid($reservation_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            SELECT SUM(amount) as total_paid 
            FROM reservations_payment 
            WHERE reservation_id = ?
        ");
        $stmt->execute([$reservation_id]);
        return (float) $stmt->fetchColumn();
    }

    public static function addPayment($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO reservations_payment 
            (reservation_id, reference_no, payment_date, amount, payment_mode, bank_details, remarks, record_by, source_account_no) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['reservation_id'],
            $data['reference_no'],
            $data['payment_date'],
            $data['amount'],
            $data['payment_mode'],
            $data['bank_details'],
            $data['remarks'],
            $data['record_by'],
            $data['source_account_no'] ?? NULL
        ]);
    }


   

}
