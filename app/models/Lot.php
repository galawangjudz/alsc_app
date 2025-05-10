<?php
require_once __DIR__ . '/../core/Model.php';

class Lot extends Model
{
    protected $table = 'lots';
    
    public static function count()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT COUNT(*) FROM lots");
        return $stmt->fetchColumn();
    }


    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM lots ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function all_available()
    {
        $instance = new static();
        $sql = "
           SELECT 
                l.*, 
                hi.id AS house_id,
                hi.price_per_sqm AS house_price,
                hi.floor_area AS house_floor_area,
                hi.model as house_model
            FROM lots l
            LEFT JOIN houses hi ON hi.lot_id = l.id
            WHERE l.status = 'Available'
            ORDER BY l.id DESC
        ";
        $stmt = $instance->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM lots WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


     public static function find_new($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM lots WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(static::class);
    }



    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO lots (site_id, block, lot, lot_area, price_per_sqm, status, remarks, title, title_owner, previous_owner)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['site_id'], $data['block'], $data['lot'], $data['lot_area'],
            $data['price_per_sqm'], $data['status'], $data['remarks'] ?? '',
            $data['title'] ?? '', $data['title_owner'] ?? '', $data['previous_owner'] ?? ''
        ]);
        return $instance->db->lastInsertId();
    }


    public static function search($query)
    {
        $instance = new static();
        $sql = "
            SELECT l.*, h.model AS house_model
            FROM lots l
            LEFT JOIN houses h ON h.lot_id = l.id
            WHERE CONCAT(l.block, ' ', l.lot, ' ', l.status, ' ', l.site_id) LIKE ?
            ORDER BY l.id DESC
            LIMIT 100
        ";
        $stmt = $instance->db->prepare($sql);
        $stmt->execute(['%' . $query . '%']);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function update($id, $data)
    {
        $instance = new static();
    
        // Define which fields are allowed to be updated
        $allowedFields = [
            'site_id', 'block', 'lot', 'lot_area', 'price_per_sqm',
            'status', 'remarks', 'title', 'title_owner', 'previous_owner'
        ];
    
        $fields = [];
        $values = [];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = ?";
                $values[] = $data[$field];
            }
        }
    
        if (empty($fields)) {
            throw new Exception("No valid fields to update.");
        }
    
        $values[] = $id;
        $sql = "UPDATE {$instance->table} SET " . implode(', ', $fields) . " WHERE id = ?";
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


