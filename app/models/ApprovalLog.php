<?php
require_once __DIR__ . '/../core/Model.php';

class ApprovalLog extends Model
{
    protected $table = 'approval_logs';

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

    public static function forReservation($reservation_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE reservation_id = ? ORDER BY action_date ASC");
        $stmt->execute([$reservation_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function log($reservation_id, $step, $action, $user_id, $remarks = null)
    {
        $instance = new static();
        $sql = "
            INSERT INTO {$instance->table} 
            (reservation_id, step, action, user_id, action_date, remarks)
            VALUES (?, ?, ?, ?, NOW(), ?)
        ";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute([$reservation_id, $step, $action, $user_id, $remarks]);
    }

    public static function update($id, $data)
    {
        $instance = new static();
        $fields = [];
        $params = [];

        foreach ($data as $key => $val) {
            $fields[] = "$key = ?";
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
}
