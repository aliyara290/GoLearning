<?php
namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';
use Config\Database;
use PDO;
use PDOException;

class UserProfile
{
    protected PDO $pdo;

    public function __construct(
    ) {
        $this->pdo = Database::getInstance();
    }

    public function viewProfile($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([":id" => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "failed to fetch userId $id data" . $error->getMessage();
        }
    }


    public function updateUserProfile($id, $firstName, $lastName, $userName, $email, $picture = null,  $bio = null, $website = null, $work = null) {
        $sql = "UPDATE users 
                SET firstName = :firstName, 
                    lastName = :lastName, 
                    bio = :bio, 
                    picture = :picture, 
                    website = :website, 
                    work = :work, 
                    username = :userName, 
                    email = :email 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":bio" => $bio,
            ":picture" => $picture,
            ":website" => $website,
            ":work" => $work,
            ":userName" => $userName,
            ":email" => $email,
            ":id" => $id
        ];
    
        $stmt->execute($data);
        return true;
    }
}
