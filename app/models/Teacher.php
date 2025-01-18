<?php 
namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\User;

class Teacher extends User {
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $username,
        string $password,
    )
    {
        echo $firstName;
        parent::__construct("teacher", $firstName, $lastName, $email, $username, $password);
        parent::register();
    }

    // public function viewProfile()
    // {
        
    // }
}