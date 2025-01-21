<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;
use PDO;
use PDOException;

class Student extends User
{

    public function enrollInCourse($student_id, $course_id)
    {
        $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
        $data = [
            ":student_id" => $student_id,
            ":course_id" => $course_id
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $error) {
            echo "failed to insert data in enrollements table: " . $error->getMessage();
            return false;
        }
    }

    public function isEnrolled($student_id, $course_id)
    {
        $sql = "SELECT COUNT(*) as count FROM enrollments WHERE student_id = :student_id AND course_id = :course_id";
        $data = [
            ":student_id" => $student_id,
            ":course_id" => $course_id
        ];

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0;
        } catch (PDOException $error) {
            echo "failed to insert data in enrollements table: " . $error->getMessage();
        }
        
    }

    public function viewMyCourses($id) {
        $sql = "SELECT 
        c.*,
        c.id as course_id,
        u.*
        from enrollments e
        LEFT JOIN courses c ON e.course_id = c.id
        LEFT JOIN users u ON e.student_id = u.id
        WHERE u.id = :id
        ORDER BY e.enrolled_at;";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([":id" => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            var_dump($result);
        } catch (PDOException $error) {
            echo "failed to fetch data: " . $error->getMessage();
        }
    }
}
