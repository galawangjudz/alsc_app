<?php
require_once __DIR__ . '/../core/Model.php';

class Permissions extends Model
{
    protected $table = 'permissions';

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
        $stmt = $instance->db->prepare("SELECT * FROM permissions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO permissions (name, description) VALUES (?, ?)");
        return $stmt->execute([
            $data['name'], $data['description'] ?? null
        ]);
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
        $sql = "UPDATE permissions SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM permissions WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
