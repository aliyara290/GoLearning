<?php 

namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Tag;


class TagController {
    private $tagModel;
    
    public function __construct()
    {
        echo "helhhlo";
        $this->tagModel = new Tag();
    }

    public function createTag() {
        $tagName = $_POST["tagName"];
        // $id = $_POST["tagId"];
        // $this->tagModel->setId($id);
        $this->tagModel->setTagName($tagName);
        $result = $this->tagModel->createTag();
        if($result) {
            header("location: /app/views/admin/tags.php");
        } else {
            echo "failed";
        }
        require "../views/admin/tags.php";
    }

    public function readAllTags() {

    }
}
