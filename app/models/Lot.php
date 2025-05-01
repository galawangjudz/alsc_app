<?php
require_once __DIR__ . '/../core/Model.php';

class Lot extends Model
{
    protected $table = 'lots';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT * FROM lots");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM lots WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO lots (block_number, lot_number, area, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['block_number'], $data['lot_number'], $data['area'], $data['status']]);
        return $instance->db->lastInsertId();
    }
}
