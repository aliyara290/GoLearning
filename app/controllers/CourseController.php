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
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["courseTitle"])) {
            $title = $_POST["courseTitle"];
            $description = $_POST["courseDescription"];
            $userOption = $_POST["select__choix"];
            $video = $_POST["videoOption"] ?? null;
            $textContent = $_POST["TextOptionContent"] ?? null;
            $tagsId = $_POST["courseSelectedTags"] ?? [];
            $categoryId = $_POST["category_id"];

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

            $result = $this->courseModel->createCourse($userOption === "text");

            if ($result) {
                header("location: /app/views/front/");
            }
        }
    }


    public function updateCourse($id,$oldCover) {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["new-courseTitle"])) {
            $title = $_POST["new-courseTitle"];
            $description = $_POST["new-courseDescription"];
            // $userOption = $_POST["select__choix"];
            $video = $_POST["new-videoOption"] ?? null;
            $textContent = $_POST["new-TextOptionContent"] ?? null;
            $tagsId = $_POST["new-courseSelectedTags"] ?? [];
            $categoryId = $_POST["new-category_id"];
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
}
