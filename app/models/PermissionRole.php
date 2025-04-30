<?php 

require_once __DIR__ . '/../core/Model.php';

class PermissionRole extends Model
{
    protected $table = 'permission_role';

    public static function assign($role_id, $permission_ids)
    {
        $instance = new static();

        // Delete old permissions
        $stmt = $instance->db->prepare("DELETE FROM permission_role WHERE role_id = ?");
        $stmt->execute([$role_id]);

        // If no permissions are selected (empty array), don't insert anything
        if (empty($permission_ids)) {
            return;  // Exit early as no new permissions to assign
        }

        // Insert new ones
        $stmt = $instance->db->prepare("INSERT INTO permission_role (role_id, permission_id) VALUES (?, ?)");
        foreach ($permission_ids as $pid) {
            $stmt->execute([$role_id, $pid]);
        }
    }

    public static function getPermissionsForRole($role_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("
            SELECT p.* FROM permissions p
            JOIN permission_role pr ON p.id = pr.permission_id
            WHERE pr.role_id = ?
        ");
        $stmt->execute([$role_id]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function getPermissionIdsForRole($role_id)
    {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT permission_id FROM permission_role WHERE role_id = ?");
        $stmt->execute([$role_id]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}