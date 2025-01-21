<?php
namespace App\Controllers;
// session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Student;

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
    }

    public function enrollInCourse() {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["courseId"], $_POST["studentId"])) {
            $student_id = $_POST["studentId"];
            $course_id = $_POST["courseId"];
            $check = $this->studentModel->enrollInCourse($student_id, $course_id);
            if($check) {
                header("location: /app/views/front/learn.php?courseId=$course_id");
            } else echo "failed";
        }
    }

    public function isEnrolled($student_id, $course_id) {
        return $this->studentModel->isEnrolled($student_id, $course_id);
    }
    public function viewMyCourses() {
        $student_id = $_SESSION["user"]["userId"];
        return $this->studentModel->viewMyCourses($student_id);
    }
}