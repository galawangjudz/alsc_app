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

    public static function forReservation($reservations_form_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE reservations_form_id = ? ORDER BY action_date ASC");
        $stmt->execute([$reservations_form_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function log($reservations_form_id, $step, $action, $user_id, $user_role, $remarks = null)
    {
        $instance = new static();
        $sql = "
            INSERT INTO {$instance->table} 
            (reservations_form_id, step, action, performed_by_user_id, performed_by_role, comments,created_at)
            VALUES (?, ?, ?, ?, ?, ?,NOW())
        ";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute([$reservations_form_id, $step, $action, $user_id, $user_role, $remarks]);
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
