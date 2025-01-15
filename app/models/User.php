<?php 

namespace App\Models;
use Config\Database;
use PDO;

abstract class User {
    protected PDO $pdo;
    protected string $firstName;
    protected string $lastName;
    protected string $picture;
    protected string $email;
    protected string $passwrod;
    protected string $role;
    protected string $work;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    
    abstract function register();
    abstract function login();
    abstract function logout();
    abstract function viewProfile();
}