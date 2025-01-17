<?php 

namespace App\Models;
use Config\Database;
use PDO;
use PDOException;

abstract class User {
    protected PDO $pdo;
    protected string $firstName;
    protected string $lastName;
    protected ?string $picture = null;
    protected string $email;
    protected string $username;
    protected string $password;
    protected string $role;
    protected ?string $work = null;
    protected ?string $bio = null;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getPicture(): ?string {
        return $this->picture;
    }

    public function setPicture(?string $picture): void {
        $this->picture = $picture;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

    public function getWork(): ?string {
        return $this->work;
    }

    public function setWork(?string $work): void {
        $this->work = $work;
    }

    public function getBio(): ?string {
        return $this->bio;
    }

    public function setBio(?string $bio): void {
        $this->bio = $bio;
    }
    
    public function register() {
        $passwrodHash = password_hash($this->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (firstName, lastName, email, username, password, role) VALUES (:firstName, :lastName, :email, :username, :password, :role)";
        $data = [
            ":firstName" => $this->firstName,
            ":lastName" => $this->lastName,
            ":email" => $this->email,
            ":username" => $this->username,
            ":password" => $passwrodHash,
            ":role" => $this->role
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $done = $stmt->execute($data);
            return $done;
        } catch(PDOException $error) {
            echo "failed to register: " . $error->getMessage();
        }
    }

    public function login() {

    }

    abstract public function viewProfile();


    // abstract function login();
    // abstract function logout();
    // abstract function viewProfile();
}