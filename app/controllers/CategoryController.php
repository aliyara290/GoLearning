<?php 

namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Category;

class CategoryController {
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function createCategory() {
        $tagName = $_POST["categoryName"];
        // $id = $_POST["tagId"];
        // $this->tagModel->setId($id);
        $this->categoryModel->setCategoryName($tagName);
        $result = $this->categoryModel->createCategory();
        if($result) {
            header("location: /app/views/admin/categories.php");
        } else {
            echo "failed";
        }
        require "../views/admin/categories.php";
    }
}