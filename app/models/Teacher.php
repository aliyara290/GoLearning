<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;
use PDO;
use PDOException;

class Teacher extends User
{
    public function viewCoursesList($id)
    {
        $sql = "SELECT 
        c.*,  
        u.firstName, 
        u.lastName,
        u.picture,
        cat.name AS category_name, 
        GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
      FROM courses c
      JOIN users u ON c.teacher_id = u.id
      LEFT JOIN categories cat ON c.category_id = cat.id
      LEFT JOIN course_tags ct ON c.id = ct.course_id
      LEFT JOIN tags t ON ct.tag_id = t.id
      WHERE c.teacher_id = :teacher_id AND c.status = 'active'
      GROUP BY c.id, u.firstName, u.lastName, cat.name
      ORDER BY c.created_at DESC;";

        $data = [
            ":teacher_id" => $id
        ];

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            error_log("Database error: " . $error->getMessage());
            return false;
        }
    }
}
