<?php
require_once __DIR__ . '/../core/Model.php';

class HouseModel extends Model
{
    protected $table = 't_model_house';


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
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO {$instance->table} (c_code, c_acronym, c_model) VALUES (?, ?, ?)");
        $stmt->execute([
            $data['c_code'],
            $data['c_acronym'],
            $data['c_model']
        ]);
        return $instance->db->lastInsertId();
    }
    public static function update($id, $data)
    {
        $instance = new static();

        // Dynamically create the SET clause for the SQL query
        $setClause = '';
        $params = [];
        foreach ($data as $key => $value) {
            $setClause .= "{$key} = ?, "; // Add each field to the SET clause
            $params[] = $value; // Append the value to the params array
        }

        // Remove the trailing comma and space from the SET clause
        $setClause = rtrim($setClause, ', ');

        // Prepare the SQL statement
        $stmt = $instance->db->prepare("UPDATE {$instance->table} SET {$setClause} WHERE id = ?");
        
        // Append the ID value to the params array
        $params[] = $id;

        // Execute the statement
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM {$instance->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
