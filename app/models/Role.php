<?php

class Role extends Model {
    public function getAllRoles() {
        $stmt = $this->db->prepare("SELECT * FROM roles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM roles WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function assignPermissions($roleId, $permissions) {
        foreach ($permissions as $permissionId) {
            $stmt = $this->db->prepare("INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)");
            $stmt->bindParam(":role_id", $roleId);
            $stmt->bindParam(":permission_id", $permissionId);
            $stmt->execute();
        }
    }

    public function getPermissionsForRole($roleId) {
        $stmt = $this->db->prepare("SELECT p.* FROM permissions p
                                    JOIN role_permissions rp ON p.id = rp.permission_id
                                    WHERE rp.role_id = :role_id");
        $stmt->bindParam(":role_id", $roleId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
