<?php

require_once __DIR__ . '/../core/Model.php';

class Fence extends Model
{
    protected $table = 'fences';

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO fences (lot_id, fence_type, material, length, cost, remarks)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['lot_id'], $data['fence_type'], $data['material'], $data['length'], $data['cost'], $data['remarks']
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
        $stmt = $instance->db->prepare("SELECT * FROM fences WHERE {$field} = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
