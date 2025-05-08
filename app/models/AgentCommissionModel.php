<?php
require_once __DIR__ . '/../core/Model.php';

class AgentCommissionModel extends Model
{
    protected $table = 'agent_commissions';

    // Fetch all commissions
    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->query("SELECT * FROM agent_commissions");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Find a commission by account number
    public static function findByAccount($account_no)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            SELECT 
                ac.*, 
                ba.account_no, 
                ba.date_of_sale, 
                CONCAT(b.last_name, ' ', b.first_name) AS buyer_name,
                CONCAT(ag.c_last_name, ' ', ag.c_first_name) AS agent_name
            FROM 
                agent_commissions ac
            LEFT JOIN buyers_account ba ON ac.account_no = ba.account_no 
            LEFT JOIN buyers_account_buyer b ON ba.account_no = b.account_no AND b.is_primary = TRUE
            LEFT JOIN t_agents ag ON ac.agent_id = ag.c_code
            WHERE ac.account_no = ?
        ");

        $stmt->execute([$account_no]);
        return $stmt->fetchAll(PDO::FETCH_OBJ); // Fetch multiple rows
    }

    // Create a new commission entry
    public static function create($data)
    {
        $instance = new static();
    
        $stmt = $instance->db->prepare("
            INSERT INTO agent_commissions (
                account_no,
                agent_id,
                commission_amount,
                rate
            ) VALUES (?, ?, ?,?)
        ");
    
        return $stmt->execute([
            $data['buyers_account_no'],
            $data['agent_id'],
            $data['commission_amount'],
            $data['rate']
        ]);
    }
    
}
