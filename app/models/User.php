<?php
require_once __DIR__ . '/../core/Model.php';


class User extends Model
{
    protected $table = 'users';


    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table}");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Debug:
        //echo "<pre>"; print_r($results);
        //exit;


        return $results;
    }
    public static function count()
    {
        // Assuming you're using PDO for database connection
     
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT COUNT(*) AS total FROM users WHERE is_active = '1'");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];  // Return the total user count
    }


    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO users (employee_id, name, password, role_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['employee_id'], $data['name'], $data['password'], $data['role_id']
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
        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }


}





