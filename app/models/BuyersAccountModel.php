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
            b.last_name + ' ' + b.first_name AS buyer_name,
            l.site_id, 
            l.block, 
            l.lot, 
            ag.c_last_name + ' ' + ag.c_first_name AS agent_name
        FROM 
            buyers_account ba
        LEFT JOIN buyers_account_buyer b ON ba.account_no = b.account_no AND b.is_primary = TRUE
        LEFT JOIN lots l ON ba.lot_id = l.id
        LEFT JOIN t_agents ag ON ba.agent_id = ag.id;");
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
                b.last_name + ' ' + b.first_name AS buyer_name,
                l.site_id, 
                l.block, 
                l.lot, 
                ag.c_last_name + ' ' + ag.c_first_name AS agent_name
            FROM 
                buyers_account ba
            LEFT JOIN buyers_account_buyer b ON ba.account_no = b.account_no AND b.is_primary = TRUE
            LEFT JOIN lots l ON ba.lot_id = l.id
            LEFT JOIN t_agents ag ON ba.agent_id = ag.id;
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
                account_type_primary,
                house_model,
                house_price_per_sqm,
                lot_area,
                lot_discount_percent,
                total_contract_price,
                floor_area,
                house_discount_percent,
                payment_type_primary,
                payment_type_secondary,
                down_payment_percent,
                financing_terms_months,
                account_status,
                date_of_sale
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");

        $stmt->execute([
            $data['lot_id'],
            $data['acc_type'],
            $data['house_model'],
            $data['house_price'],
            $data['lot_area'],
            $data['lot_discount'],
            $data['lcp'],
            $data['floor_area'],
            $data['house_discount'],
            $data['payment_type_primary'],
            $data['payment_type_secondary'],
            $data['down_payment'],
            $data['term_months'],
            $data['account_status'],
            $data['date_of_sale']
        ]);

        // Return the last inserted ID or false on failure
        return $instance->db->lastInsertId();
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
