<?php 

namespace App\Models;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Core\Crud;

class Tag {
    private int $id;
    private string $tagName;
    private string $table = "tags";

    public function setId(int $id) {
        $this->id = $id;
    }
    public function gettId() {
        return $this->id;
    }

    public function setTagName(string $tagName) {
        $this->tagName = $tagName;
    }
    public function getTagName() {
        return $this->tagName;
    }

    public function createTag() {
        Crud::create($this->table, ["name" => $this->tagName]);
    }
    public function updateTag() {
        Crud::update($this->table, ["name" => $this->tagName], "id", $this->id);
    }
    public function deleteTag() {
        Crud::delete($this->table, "id", $this->id);
    }
    public function readAllTags() {
        Crud::readAll($this->table);
    }
    public function countTags() {
        Crud::count($this->table);
    }
}