<?php
require_once __DIR__ . '/../core/Model.php';

class Reservations extends Model
{
    protected $table = 'buyers_account_draft';

    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->query("
        SELECT 
            ba.*, 
            b.*,
            p.c_acronym AS project_acronym,
            l.site_id, 
            l.block, 
            l.lot
        FROM 
            buyers_account_draft ba
        LEFT JOIN reservations_buyer b ON ba.id = b.buyers_account_draft_id AND b.is_primary = TRUE
        LEFT JOIN lots l ON ba.lot_id = l.id
        LEFT JOIN t_projects p ON l.site_id = p.c_code");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function app_log()
    {
        $instance = new static();
        $stmt = $instance->db->query("
        SELECT 
            al.buyers_account_draft_id AS id,
            al.step,
            al.action AS status,
            al.performed_by_user_id,
            al.performed_by_role,
            al.comments,
            al.created_at
        FROM approval_logs al
        WHERE al.buyers_account_draft_id IN (SELECT id FROM buyers_account_draft)");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM {$instance->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function create_buyer($data)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("
            INSERT INTO reservations_buyer (
                buyers_account_draft_id,
                first_name,
                last_name,
                contact_no,
                is_primary
            ) VALUES (?, ?, ?, ?,?)
        ");

        return $stmt->execute([
            $data['buyers_account_draft_id'],
            $data['first_name'],
            $data['last_name'],
            $data['contact_no'],
            $data['is_primary']
        ]);
    }

    public static function create_rsv_commission($data)
    {
        $instance = new static();
    
        $stmt = $instance->db->prepare("
            INSERT INTO reservations_commission (
                buyers_account_draft_id,
                agent_id,
                commission_amount,
                rate
            ) VALUES (?, ?, ?,?)
        ");
    
        return $stmt->execute([
            $data['buyers_account_draft_id'],
            $data['agent_id'],
            $data['commission_amount'],
            $data['rate']
        ]);
    }

    public static function create($data)
    {
        $instance = new static();
        $fields = [
            'reservation_no', 'account_no', 'lot_id', 'date_of_sale',
            'account_type', 'account_type_secondary', 'lot_area', 'lot_price_per_sqm',
            'lot_discount_percent', 'lot_discount_amount', 'house_model', 'floor_area',
            'house_price_per_sqm', 'house_discount_percent', 'house_discount_amount',
            'tcp_discount_percent', 'tcp_discount_amount', 'total_contract_price',
            'vat_amount', 'net_total_contract_price', 'reservation_fee',
            'payment_type_primary', 'payment_type_secondary', 'down_payment_percent',
            'net_down_payment', 'number_of_payments', 'monthly_down_payment',
            'first_down_payment_date', 'full_down_payment_due_date', 'amount_financed',
            'financing_terms_months', 'interest_rate', 'fixed_factor', 'monthly_amortization',
            'amortization_start_date', 'fence_cost', 'add_cost', // <-- added
            'is_voided', 'voided_by', 'void_reason'
        ];


        $columns = $fields; // These are actual column names
        $placeholders = array_map(fn($f) => ":$f", $fields); // Generate placeholders

        $sql = "
            INSERT INTO {$instance->table} (
                " . implode(', ', $columns) . "
            ) VALUES (
                " . implode(', ', $placeholders) . "
            )
        ";
        $params = [];
       # foreach ($fields as $field) {
        #    $params[":$field"] = $data[$field] ?? null;
        #}
        foreach ($fields as $field) {
            $params[":$field"] = isset($data[$field]) ? $data[$field] : null;
        }

        $stmt = $instance->db->prepare($sql);
        $stmt->execute($params);

        #$data['id'] = $instance->db->lastInsertId();
        #return (object)$data;

        return $instance->db->lastInsertId();
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
        $sql = "UPDATE {$instance->table} SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $instance->db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function delete($id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("DELETE FROM {$instance->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function attachAgent($agent_id)
    {
        $stmt = $this->db->prepare("INSERT INTO reservation_agents (reservation_id, agent_id) VALUES (?, ?)");
        return $stmt->execute([$this->id, $agent_id]);
    }

    public function agents()
    {
        $stmt = $this->db->prepare("
            SELECT a.* FROM t_agents a
            JOIN reservation_agents ra ON ra.agent_id = a.id
            WHERE ra.reservation_id = ?
        ");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
