<?php
require_once __DIR__ . '/../core/Model.php';

class Reservations extends Model
{
    protected $table = 'reservations';

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

    public static function create($data)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("INSERT INTO {$instance->table} (buyer1_name, buyer1_contact, buyer2_name, buyer2_contact, address, lot_id, house_id, fence, down_payment, term_months, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['buyer1_name'],
            $data['buyer1_contact'],
            $data['buyer2_name'] ?? null,
            $data['buyer2_contact'] ?? null,
            $data['address'],
            $data['lot_id'],
            $data['house_id'] ?? null,
            $data['fence'] ?? false,
            $data['down_payment'],
            $data['term_months'],
            'draft' // Default status
        ]);
        return $instance->find($instance->db->lastInsertId());
    }


    public static function update($id, $data)
    {
        $instance = new static();

        $fields = [];
        $params = [];

        foreach ($data as $key => $val) {
            if ($key === 'id') continue; // Skip ID field
            $fields[] = "$key = ?";
            $params[] = $val;
        }

        $params[] = $id;

        $sql = "UPDATE {$instance->table} SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function attachAgent($agent_id)
    {
        $stmt = $this->db->prepare("INSERT INTO reservation_agents (reservation_id, agent_id) VALUES (?, ?)");
        $stmt->execute([$this->id, $agent_id]);
    }

    public function lot()
    {
        return Lot::find($this->lot_id);
    }

    public function house()
    {
        return House::find($this->house_id);
    }

    public function agents()
    {
        $stmt = $this->db->prepare("SELECT agents.* FROM agents JOIN reservation_agents ON agents.id = reservation_agents.agent_id WHERE reservation_agents.reservation_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET status = ? WHERE id = ?");
        $stmt->execute([$this->status, $this->id]);
    }
}
