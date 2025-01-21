<?php
namespace App\Middleware;

class RoleMiddleware
{
    public static function handle(array $allowedRoles)
    {
        session_start();
        if (!isset($_SESSION['user']['role'])) {
            header("location: /app/views/front/login.php");
        }
        if (!in_array($_SESSION['user']['role'], $allowedRoles)) {
            header("location: /app/views/front/index.php");
        }
    }
}
