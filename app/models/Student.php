<?php 
namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;
class Student extends User {
    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $username,
        string $password,
    )
    {
        parent::__construct("student", $firstName, $lastName, $email, $username, $password);
        parent::register();
    }

    // public function viewProfile()
    // {
        
    // }
}