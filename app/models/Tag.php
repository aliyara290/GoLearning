<?php 
namespace App\Models;

use App\Core\Crud;

class Tag {
    private int $id;
    private string $tagName;
    private string $table = "tags";

    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }

    public function setTagName(string $tagName) {
        $this->tagName = $tagName;
    }
    public function getTagName(): string {
        return $this->tagName;
    }

    public function createTag() {
        return Crud::create($this->table, ["name" => $this->tagName]);
    }

    public function updateTag() {
        return Crud::update($this->table, ["name" => $this->tagName], "id", $this->id);
    }

    public function deleteTag() {
        return Crud::delete($this->table, "id", $this->id);
    }

    public function readAllTags() {
        return Crud::readAll($this->table);
    }

    public function readTagById() {
        return Crud::readByCondition($this->table, "id", $this->id);
    }

    public function countTags() {
        return Crud::count($this->table);
    }
}
