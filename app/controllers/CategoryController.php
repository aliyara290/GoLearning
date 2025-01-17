<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Category;

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function createCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["categoryName"])) {
            $categoryName = $_POST["categoryName"];
            $this->categoryModel->setCategoryName($categoryName);
            $result = $this->categoryModel->createCategory();
            if ($result) {
                header("location: /app/views/admin/categories.php");
            } else {
                echo "failed";
            }
        }
    }

    public function readAllCategories()
    {
        return $this->categoryModel->readAllCategories();
    }

    public function readCategoryById()
    {
        $id = $_GET["categoryId"];
        $this->categoryModel->setId($id);
        return $this->categoryModel->readCategoryById();
    }


    public function deleteTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["categoryId"]) && $_GET["action"] === "deleteCategory") {
            $id = $_GET["categoryId"];
            $this->categoryModel->setId($id);
            $result = $this->categoryModel->deleteCategory();
            if ($result) {
                header("location: /app/views/admin/categories.php");
                exit();
            }
        }
    }

    public function updateTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["categoryId"])) {
            $id = $_POST["categoryId"];
            $categoryName = $_POST["updateCategoryName"];
            $this->categoryModel->setId($id);
            $this->categoryModel->setCategoryName($categoryName);
            $result = $this->categoryModel->updateCategory();
            if ($result) {
                header("location: /app/views/admin/categories.php");
                exit();
            }
        }
    }
}

$categoryController = new CategoryController();
$categoryController->createCategory();
$categoryController->deleteTag();
$categoryController->updateTag();
