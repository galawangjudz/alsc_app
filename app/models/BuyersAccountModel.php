<?php
require_once __DIR__ . '/../core/Model.php';

class BuyersAccountModel extends Model
{
    protected $table = 'buyers_account';

    // Fetch all the buyer accounts
    public static function all()
    {
        $instance = new static();
        $stmt = $instance->db->query("
            SELECT 
                ba.*, 
                b.full_name AS buyer_name,
                l.site_id, 
                l.block, 
                l.lot, 
                ag.c_last_name + ' ' + ag.c_first_name AS agent_name
            FROM 
                buyers_account ba
            LEFT JOIN buyers b ON ba.primary_buyer_id = b.id
            LEFT JOIN lots l ON ba.lot_id = l.id
            LEFT JOIN t_agents ag ON ba.agent_id = ag.id");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Find a buyer account by account number
    public static function find($account_no)
    {
        $instance = new static();
        // SQL query to join the buyers_account, buyer, lot, and agent tables
        $stmt = $instance->db->prepare("
             SELECT 
                ba.*, 
                b.full_name AS buyer_name,
                l.site_id, 
                l.block, 
                l.lot, 
                ag.c_last_name + ' ' + ag.c_first_name AS agent_name
            FROM 
                buyers_account ba
            LEFT JOIN buyers b ON ba.primary_buyer_id = b.id
            LEFT JOIN lots l ON ba.lot_id = l.id
            LEFT JOIN t_agents ag ON ba.agent_id = ag.id
            WHERE ba.account_no = ?
        ");
        
        $stmt->execute([$account_no]);
        // Return the result as an object (including data from the buyers_account, buyer, lot, and agent tables)
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Create a new buyer account
    public static function create($data)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("
            INSERT INTO buyers_account (
                lot_id, 
                primary_buyer_id, 
                agent_id, 
                property_id, 
                date_of_sale, 
                account_status
            ) VALUES (?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['lot_id'],
            $data['primary_buyer_id'],
            $data['agent_id'],
            $data['property_id'],
            $data['date_of_sale'],
            $data['account_status'],
        ]);
    }

    // Update an existing buyer account
    public static function update($account_no, $data)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("
            UPDATE buyers_account SET 
                account_status = ? 
            WHERE account_no = ?
        ");

        return $stmt->execute([
            $data['account_status'],
            $account_no
        ]);
    }
}
