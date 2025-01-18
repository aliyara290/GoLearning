<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Config\Database;
use App\Core\Validator;

use PDO;
use PDOException;

abstract class User
{
    protected PDO $pdo;
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?string $picture = null;
    protected ?string $email = null;
    protected ?string $username = null;
    protected ?string $password = null;
    protected ?string $role = null;
    protected ?string $work = null;
    protected ?string $bio = null;

    public function __construct(
        ?string $role = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $username = null,
        ?string $password = null,
    ) {
        $this->pdo = Database::getInstance();
        $this->role = $role;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }



    public function register()
    {
        $passwrodHash = password_hash($this->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (firstName, lastName, email, username, password, role, status) VALUES (:firstName, :lastName, :email, :username, :password, :role, :status)";
        $data = [
            ":firstName" => $this->firstName,
            ":lastName" => $this->lastName,
            ":email" => $this->email,
            ":username" => $this->username,
            ":password" => $passwrodHash,
            ":role" => $this->role,
            ":status" => ($this->role === "teacher") ? "pending" : "active",
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $done = $stmt->execute($data);
            return $done;
        } catch (PDOException $error) {
            echo "failed to register: " . $error->getMessage();
        }
    }

    // abstract public function viewProfile();
}
