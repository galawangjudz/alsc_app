<?php

class User extends Model {

    public function createUser($username, $password, $email, $roleId) {
        // Hash password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (username, password, email, role_id) 
                                    VALUES (:username, :password, :email, :role_id)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role_id', $roleId);
        $stmt->execute();
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserRole($userId) {
        $stmt = $this->db->prepare("SELECT r.name FROM roles r
                                    JOIN users u ON u.role_id = r.id
                                    WHERE u.id = :user_id");
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $username, $email, $roleId) {
        $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, role_id = :role_id WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role_id', $roleId);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
