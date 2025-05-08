<?php
require_once __DIR__ . '/../core/Model.php';



class BuyersAccountBuyersModel extends Model
{
    protected $table = 'buyers_account_buyer';


    public static function create($data)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("
            INSERT INTO buyers_account_buyer (
                account_no,
                first_name,
                last_name,
                contact_no,
                is_primary
            ) VALUES (?, ?, ?, ?,?)
        ");

        return $stmt->execute([
            $data['buyers_account_no'],
            $data['first_name'],
            $data['last_name'],
            $data['contact_no'],
            $data['is_primary']
        ]);
    }

    /**
     * Fetch all buyers by account ID
     */
    public static function getByAccountId($accountId)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("SELECT * FROM buyers_account_buyer WHERE buyers_account_id = ?");
        $stmt->execute([$accountId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Optional: delete all buyers for an account
     */
    public static function deleteByAccountId($accountId)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("DELETE FROM buyers_account_buyer WHERE buyers_account_id = ?");
        return $stmt->execute([$accountId]);
    }

    public static function co_buyers($accountId)
    {
        $instance = new static();

        $stmt = $instance->db->prepare("SELECT * FROM buyers_account_buyer WHERE account_no = ? and is_primary = FALSE");
        $stmt->execute([$accountId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
