<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Course;

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    public function createCourse()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["courseTitle"]) && $_SESSION["user"]["role"] === "teacher") {
            $title = $_POST["courseTitle"];
            $description = $_POST["courseDescription"];
            $userOption = $_POST["select__choix"];
            $video = $_POST["videoOption"] ?? null;
            $textContent = $_POST["TextOptionContent"] ?? null;
            $tagsId = $_POST["courseSelectedTags"] ?? [];
            $categoryId = $_POST["category_id"];
            $teacherId = $_POST["teacherId"];

            $cover = null;
            if (isset($_FILES["courseCover"]) && $_FILES['courseCover']['error'] === UPLOAD_ERR_OK) {
                $uploadFolder = "../../../../uploads/";
                if (!file_exists($uploadFolder)) {
                    mkdir('../../../../uploads', 0777, true);
                }
                $fileName = uniqid();
                move_uploaded_file($_FILES["courseCover"]["tmp_name"], $uploadFolder . $fileName);
                $cover = $uploadFolder . $fileName;
            }

            $this->courseModel->setTitle($title);
            $this->courseModel->setDescription($description);
            $this->courseModel->setCover($cover);
            $this->courseModel->setCategoryId($categoryId);
            $this->courseModel->setTags($tagsId);
            $this->courseModel->setVideo($video);
            $this->courseModel->setContent($textContent);
            $this->courseModel->setTeacherId($teacherId);

            $result = $this->courseModel->createCourse($userOption === "text");

            if ($result) {
                header("location: /app/views/front/coursesList.php");
            }
        }
    }


    public function updateCourse($id, $oldCover)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["new-courseTitle"])) {
            $title = $_POST["new-courseTitle"];
            $description = $_POST["new-courseDescription"];
            // $userOption = $_POST["select__choix"];
            $video = $_POST["new-videoOption"] ?? null;
            $textContent = $_POST["new-TextOptionContent"] ?? null;
            $tagsId = $_POST["new-courseSelectedTags"] ?? [];
            $categoryId = $_POST["new-category_id"];
            $teacherId = $_POST["teacherId"];

            $cover = $oldCover;
            if (isset($_FILES["new-courseCover"]) && $_FILES['new-courseCover']['error'] === UPLOAD_ERR_OK) {
                $uploadFolder = "../../../../uploads/";
                if (!file_exists($uploadFolder)) {
                    mkdir('../../../../uploads', 0777, true);
                }
                $fileName = uniqid();
                move_uploaded_file($_FILES["new-courseCover"]["tmp_name"], $uploadFolder . $fileName);
                $cover = $uploadFolder . $fileName;
            }

            // $this->courseModel->setId();
            $this->courseModel->setTitle($title);
            $this->courseModel->setDescription($description);
            $this->courseModel->setCover($cover);
            $this->courseModel->setCategoryId($categoryId);
            $this->courseModel->setTags($tagsId);
            $this->courseModel->setVideo($video);
            $this->courseModel->setContent($textContent);
            $this->courseModel->setTeacherId($teacherId);

            $result = $this->courseModel->updateCourse($id);

            if ($result) {
                header("location: /app/views/front/");
            }
        }
    }


    public function readCourseById($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            echo "Invalid course ID.";
            return false;
        }
        $this->courseModel->setId($id);
        $result = $this->courseModel->readCourseById();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function readAllCourses($status, $page, $limit)
    {
        $page = max((int)$page, 1);
        $offset = ($page - 1) * $limit;
        $records = $this->courseModel->readAllCourses($status, $limit, $offset);
        $totalRecords = $this->courseModel->countAllCourses($status);
        $totalPages = ceil($totalRecords / $limit);

        return [
            "records" => $records,
            'totalRecords' => $totalRecords,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];
    }

    public function updateCourseStatus($id, $status)
    {
        $this->courseModel->setId($id);
        $chech = $this->courseModel->updateCourseStatus($status);
        if ($chech) {
            header("location: /app/views/admin/courses.php");
        }
    }

    public function deleteCourse($id)
    {
        $this->courseModel->setId($id);
        return $this->courseModel->deleteCourse($id);
    }

    public function searchForCourse() {
        if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["search"])) {
            $searchInput = htmlspecialchars($_GET["search"]);
            return $this->courseModel->searchForCourse($searchInput);
        } else echo "failed";
    }
}
