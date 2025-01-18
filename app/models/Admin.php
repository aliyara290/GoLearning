<?php 
namespace App\Models;
use App\Models\User;
use PDO;
use PDOException;

class Admin extends User {

    public function viewAllUsers() {
        $sql = "SELECT id,firstName,lastName, username, email, status, picture, role, joined FROM users ORDER BY joined";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch(PDOException $error) {
            echo "failed to fetch users details: " . $error->getMessage();
        }
    }

    public function activeUser($id) {
        $sql = "UPDATE users SET status = 'active' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    public function suspendUser($id) {
        $sql = "UPDATE users SET status = 'suspended' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    // public function viewProfile()
    // {
        
    // }
}