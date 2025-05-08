<?php
require_once __DIR__ . '/../core/Model.php';

class Payment extends Model
{
    protected $table = 'payments';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $sql = "INSERT INTO {$instance->table} 
                (account_no, due_date,payment_date, or_no, amount_paid, amount_due, principal, interest, surcharge, method) 
                VALUES (:account_no, :due_date, :payment_date, :or_no, :amount_paid, :amount_due, :principal, :interest, :surcharge, :method)";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute([
            ':account_no'   => $data['account_no'],
            ':due_date'     => $data['due_date'],
            ':payment_date' => $data['payment_date'],
            ':or_no'        => $data['or_no'],
            ':amount_paid'  => $data['amount_paid'],
            ':amount_due'   => $data['amount_due'],
            ':principal'    => $data['principal'],
            ':interest'     => $data['interest'],
            ':surcharge'    => $data['surcharge'],
            ':method'       => $data['method'],
        ]);
    }

    public static function update($id, $data)
    {
        $instance = new static();
        $fields = [];
        $params = [];

        foreach ($data as $key => $val) {
            $fields[] = "`$key` = ?";
            $params[] = $val;
        }

        $params[] = $id;
        $sql = "UPDATE {$instance->table} SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM {$instance->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function forAccount($account_no)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE account_no = ? ORDER BY payment_date DESC");
        $stmt->execute([$account_no]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
