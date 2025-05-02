<?php 
require_once __DIR__ . '/../core/Model.php';

class AdditionalCost extends Model
{
    protected $table = 'additional_costs';

    public static function count()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT COUNT(*) FROM additional_costs");
        return $stmt->fetchColumn();
    }

    public static function findByLot($lot_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM additional_costs WHERE lot_id = ?");
        $stmt->execute([$lot_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO additional_costs (lot_id, description, cost, remarks)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['lot_id'], $data['description'], $data['cost'], $data['remarks']
        ]);
        return $instance->db->lastInsertId();
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

    public static function where($field, $value)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM additional_costs WHERE {$field} = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
