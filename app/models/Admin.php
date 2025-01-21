<?php

namespace App\Models;

use App\Models\User;
use PDO;
use PDOException;

class Admin extends User
{

    public function viewAllUsers()
    {
        $sql = "SELECT id,firstName,lastName, username, email, status, picture, role, joined FROM users ORDER BY joined";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $error) {
            echo "failed to fetch users details: " . $error->getMessage();
        }
    }

    public function activeUser($id)
    {
        $sql = "UPDATE users SET status = 'active' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    public function suspendUser($id)
    {
        $sql = "UPDATE users SET status = 'suspended' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $id]);
        return $check;
    }

    public function countCoursesByCategory()
    {
        $sql = "SELECT 
        c.name AS category_name,
        COUNT(co.id) AS total_courses
        FROM categories c
        LEFT JOIN courses co ON c.id = co.category_id
        GROUP BY c.id, c.name
        ORDER BY total_courses DESC;";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $courses;
        } catch (PDOException $error) {
            echo "failed to fetch users details: " . $error->getMessage();
        }
    }

    public function topCourse()
    {
        $sql = "SELECT 
    c.id AS course_id, 
    c.title AS course_title, 
    COUNT(e.id) AS total_students
    FROM 
        courses c
    LEFT JOIN 
        enrollments e ON c.id = e.course_id
    GROUP BY 
        c.id, c.title
    ORDER BY 
        total_students DESC
    LIMIT 1;
    ";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $course = $stmt->fetch(PDO::FETCH_ASSOC);
            return $course;
        } catch (PDOException $error) {
            echo "failed to fetch course details: " . $error->getMessage();
        }
    }
    public function topThreeTeachers()
    {
        $sql = "SELECT 
    u.id AS teacher_id, 
    CONCAT(u.firstName, ' ', u.lastName) AS teacher_name, 
    COUNT(c.id) AS total_courses
    FROM 
        users u
    LEFT JOIN 
        courses c ON u.id = c.teacher_id
    WHERE 
        u.role = 'teacher'
    GROUP BY 
        u.id, teacher_name
    ORDER BY 
        total_courses DESC
    LIMIT 3;

    ";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $course;
        } catch (PDOException $error) {
            echo "failed to fetch course details: " . $error->getMessage();
        }
    }
}
