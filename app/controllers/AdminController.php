<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Admin;

class AdminController
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new Admin();
    }

    public function getAllUers() {
        $users = $this->adminModel->viewAllUsers();
        if($users) {
            return $users;
        } else echo "failed to fetch users 2";
    }

    public function activeUser() {
        if(isset($_GET["action"]) == "activeUser" && isset($_GET["identifier"])) {
            $id = $_GET["identifier"];
            $check = $this->adminModel->activeUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

    public function suspendUser() {
        if(isset($_GET["action"]) == "suspendUser" && isset($_GET["usrId"])) {
            $id = $_GET["usrId"];
            $check = $this->adminModel->suspendUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

    public function deleteUser() {
        if(isset($_GET["action"]) == "deleteUser" && isset($_GET["userID"])) {
            $id = $_GET["userID"];
            $check = $this->adminModel->deleteUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

    public function countCoursesByCategory() {
        $results = $this->adminModel->countCoursesByCategory();
        $labels = [];
        $counts = [];
        foreach($results as $result) {
            $labels[] = $result["category_name"];
            $counts[] = $result["total_courses"];
        };
        return  [
            "labels" => $labels,
            "counts" => $counts
        ];
    }
    public function topCourse() {
        $results = $this->adminModel->topCourse();
        return $results;
    }

    public function topThreeTeachers() {
        $results = $this->adminModel->topThreeTeachers();
        $labels = [];
        $counts = [];
        foreach($results as $result) {
            $labels[] = $result["teacher_name"];
            $counts[] = $result["total_courses"];
        };
        return  [
            "labels" => $labels,
            "counts" => $counts
        ];
    }
    

}
