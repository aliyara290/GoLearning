<?php 
namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\User;
use PDOException;

class Student extends User {
    
    public function enrollInCourse($student_id, $course_id) {
        $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
        $data = [
            ":student_id" => $student_id,
            ":course_id" => $course_id
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch(PDOException $error) {
            echo "failed to insert data in enrollements table: ". $error->getMessage();
            return false;
        }
    }
}
