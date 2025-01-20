<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Config\Database;
use App\Core\Validator;

use PDO;
use PDOException;

abstract class User {
    protected $pdo;
    protected $role;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getRole() {
        return $this->role;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function register()
    {
        $passwordHash = password_hash($this->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (firstName, lastName, email, username, password, role, status) VALUES (:firstName, :lastName, :email, :username, :password, :role, :status)";
        $data = [
            ":firstName" => $this->firstName,
            ":lastName" => $this->lastName,
            ":email" => $this->email,
            ":username" => $this->username,
            ":password" => $passwordHash,
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

}
