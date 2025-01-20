<?php
namespace App\Controllers;
// session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Student;

class StudentController
{
    private $teacherModel;

    public function __construct()
    {
        $this->teacherModel = new Student();
    }

    public function enrollInCourse() {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["courseId"], $_POST["studentId"])) {
            $student_id = $_POST["studentId"];
            $course_id = $_POST["courseId"];
            $check = $this->teacherModel->enrollInCourse($student_id, $course_id);
            if($check) {
                header("location: /app/views/front/learn.php?courseId=$course_id");
            } else echo "failed";
        }
    }
}