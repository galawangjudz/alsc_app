<?php
require_once __DIR__ . '/../core/Model.php';

class HouseModel extends Model
{
    protected $table = 't_model_house';


    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT * FROM t_model_house");
        return $stmt->fetchColumn();
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO t_model_house (c_code, c_model, c_acronym)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([
            $data['c_code'], $data['c_model'], $data['c_acronym']
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
        $stmt = $instance->db->prepare("DELETE FROM " . $instance->table . " WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
