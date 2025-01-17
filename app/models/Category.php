<?php 
namespace App\Models;
use App\Core\Crud;

class Category {
    private int $id;
    private string $table = "categories";
    private string $categoryName;

    
    public function setId(int $id) {
        $this->id = $id;
    }
    public function gettId() {
        return $this->id;
    }

    public function setCategoryName(string $categoryName) {
        $this->categoryName = $categoryName;
    }
    public function getCategoryName() {
        return $this->categoryName;
    }

    public function createCategory() {
        return Crud::create($this->table, ["name" => $this->categoryName]);
    }
    public function updateCategory() {
        return Crud::update($this->table, ["name" => $this->categoryName], "id", $this->id);
    }
    public function deleteCategory() {
        return Crud::delete($this->table, "id", $this->id);
    }
    public function readAllCategories() {
        return Crud::readAll($this->table);
    }

    public function readCategoryById() {
        return Crud::readByCondition($this->table, "id", $this->id);
    }
    
    public function countCategories() {
        return Crud::count($this->table);
    }
}
