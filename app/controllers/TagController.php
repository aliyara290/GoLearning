<?php
namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Tag;


class TagController
{
    private $tagModel;

    public function __construct()
    {
        $this->tagModel = new Tag();
    }

    public function createTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["tagName"])) {
            $tagName = $_POST["tagName"];
            $this->tagModel->setTagName($tagName);
            $result = $this->tagModel->createTag();
            if ($result) {
                header("location: /app/views/admin/tags.php");
                exit();
            }
        }
    }

    public function readAllTags()
    {
        return $this->tagModel->readAllTags();
    }

    public function readTagById()
    {
        $id = $_GET["tagId"];
        $this->tagModel->setId($id);
        return $this->tagModel->readTagById();
    }

    public function deleteTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["tagId"]) && $_GET["action"] === "deleteTag") {
            $id = $_GET["tagId"];
            $this->tagModel->setId($id);
            $result = $this->tagModel->deleteTag();
            if ($result) {
                header("location: /app/views/admin/tags.php");
                exit();
            }
        }
    }

    public function updateTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["tagId"])) {
            $id = $_POST["tagId"];
            $tagName = $_POST["updateTagName"];
            $this->tagModel->setId($id);
            $this->tagModel->setTagName($tagName);
            $result = $this->tagModel->updateTag();
            if ($result) {
                header("location: /app/views/admin/tags.php");
                exit();
            }
        }
    }
}


$tagController = new TagController();
$tagController->createTag();
$tagController->deleteTag();
$tagController->updateTag();

