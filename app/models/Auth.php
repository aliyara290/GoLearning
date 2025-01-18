<?php 
namespace App\Models;
use App\Models\User;
use PDO;
use PDOException;

class Auth extends User  {
    public function login($identifier, $password) {
        $sql = "SELECT * FROM users WHERE email = :email OR username = :username";
        $data = [
            ":email" => $identifier,
            ":username" => $identifier
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user) {
                if(password_verify($password, $user["password"])) {
                    return $user;
                }
            }
        } catch(PDOException $error) {
            echo "failed to register: " . $error->getMessage();
        }

    }
}