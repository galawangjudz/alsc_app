<?php

require_once __DIR__ . '/../core/Model.php';

class Roles extends Model
{
    protected $table = 'roles';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM roles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO roles (name) VALUES (?)");
        $stmt->execute([$data['name']]);
        return $instance->db->lastInsertId();
    }

    public static function update($id, $data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("UPDATE roles SET name = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $id]);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM roles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}