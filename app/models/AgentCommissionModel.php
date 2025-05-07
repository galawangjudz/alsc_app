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
        // SQL query to join buyers_account and agent_commissions
        $stmt = $instance->db->prepare("
            SELECT 
                ac.*, 
                ba.account_no, 
                ba.date_of_sale, 
                b.full_name AS buyer_name, 
                ag.c_last_name + ' ' + ag.c_first_name AS agent_name
            FROM 
                agent_commissions ac
            LEFT JOIN buyers_account ba ON ac.account_no = ba.account_no
            LEFT JOIN buyers b ON ba.primary_buyer_id = b.id
            LEFT JOIN t_agents ag ON ac.agent_id = ag.id
            WHERE ac.account_no = ?
        ");

        $stmt->execute([$account_no]);
        // Return the result as an object
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Create a new commission entry
    public static function create($data)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("
            INSERT INTO agent_commissions (account_no, agent_id, commission_amount, paid)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['account_no'],
            $data['agent_id'],
            $data['commission_amount'],
            $data['paid'],
        ]);
    }
}
