<?php
namespace App\Controllers;
// session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Teacher;

class TeacherController
{
    private $teacherModel;

    public function __construct()
    {
        $this->teacherModel = new Teacher();
    }


    public function viewCoursesList() {
        $id = $_SESSION["user"]["userId"];
        $courses = $this->teacherModel->viewCoursesList($id);
        return $courses;
    }
}
