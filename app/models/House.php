<?php

require_once __DIR__ . '/../core/Model.php';

class House extends Model
{
    protected $table = 'houses';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM houses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM houses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO houses (lot_id, name, type, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $data['lot_id'],
            $data['name'],
            $data['type'],
            $data['status']
        ]);
        return $instance->db->lastInsertId();
    }

    public static function update($id, $data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("UPDATE houses SET lot_id = ?, name = ?, type = ?, status = ? WHERE id = ?");
        return $stmt->execute([
            $data['lot_id'],
            $data['name'],
            $data['type'],
            $data['status'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM houses WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
