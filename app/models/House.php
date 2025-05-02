<?php
require_once __DIR__ . '/../core/Model.php';

class House extends Model
{
    protected $table = 'houses';


    public static function count()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT COUNT(*) FROM houses");
        return $stmt->fetchColumn();
    }


    
    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            SELECT h.*, l.lot_area, l.status AS lot_status
            FROM houses h
            LEFT JOIN lots l ON l.id = h.lot_id
            ORDER BY h.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO houses (lot_id, model, floor_area, price_per_sqm, status, unit_status, house_type, remarks)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['lot_id'], $data['model'], $data['floor_area'], $data['price_per_sqm'],
            $data['status'], $data['unit_status'], $data['house_type'], $data['remarks']
        ]);
        return $instance->db->lastInsertId();
    }
    public static function findByLot($lot_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM houses WHERE lot_id = ?");
        $stmt->execute([$lot_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $data)
    {
        $instance = new static();
        $fields = array_keys($data);

        // Safely remove 'id' if it exists
        if (($key = array_search('id', $fields)) !== false) {
            unset($fields[$key]);
        }

        $set = implode(', ', array_map(fn($f) => "$f = ?", $fields));
        $values = array_map(fn($f) => $data[$f], $fields);
        $values[] = $id;

        $sql = "UPDATE " . $instance->table . " SET $set WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($values);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM " . $instance->table . " WHERE lot_id = ?");
        return $stmt->execute([$id]);
    }
}
