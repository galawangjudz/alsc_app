<?php

class Permission extends Model {
    public function getAllPermissions() {
        $stmt = $this->db->prepare("SELECT * FROM permissions");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPermission($name, $description) {
        $stmt = $this->db->prepare("INSERT INTO permissions (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function assignPermissionToRole($roleId, $permissionId) {
        $stmt = $this->db->prepare("INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)");
        $stmt->bindParam(':role_id', $roleId);
        $stmt->bindParam(':permission_id', $permissionId);
        $stmt->execute();
    }
}
