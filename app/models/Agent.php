<?php
require_once __DIR__ . '/../core/Model.php';

class Agent extends Model
{
    protected $table = 't_agents';

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
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            INSERT INTO t_agents (
                c_code, c_last_name, c_first_name, c_middle_initial, c_nick_name,
                c_sex, c_birthdate, c_birth_place, c_address_ln1, c_address_ln2,
                c_tel_no, c_civil_status, c_sss_no, c_tin, c_status,
                c_recruited_by, c_hire_date, c_position, c_network, c_division,
                c_rate, c_withholding_tax
            ) VALUES (
                :c_code, :c_last_name, :c_first_name, :c_middle_initial, :c_nick_name,
                :c_sex, :c_birthdate, :c_birth_place, :c_address_ln1, :c_address_ln2,
                :c_tel_no, :c_civil_status, :c_sss_no, :c_tin, :c_status,
                :c_recruited_by, :c_hire_date, :c_position, :c_network, :c_division,
                :c_rate, :c_withholding_tax
            )
        ");
        return $stmt->execute($data);
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
        $sql = "UPDATE t_agents SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM t_agents WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
