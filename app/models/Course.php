<?php

namespace App\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Config\Database;
use PDO;
use PDOException;

class Course
{
    private $pdo;
    private int $id;
    private string $table = "courses";
    private string $title;
    private string $content;
    private string $video;
    private string $description;
    private string $cover;
    private string $categoryId;
    private array $tags = [];
    private int $teacherId;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setVideo(string $video): void
    {
        $this->video = $video;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }

    public function setCategoryId(string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function setTeacherId(int $teacherId): void
    {
        $this->teacherId = $teacherId;
    }

    public function __call($method, $arguments)
    {
        if ($method === 'createCourse') {
            $isTextContent = $arguments[0] ?? true;
            return $this->createCourse($isTextContent);
        }
    }

    private function createCourse(bool $isTextContent = true)
    {
        $columns = "title, slug, description, " . ($isTextContent ? "content" : "video") . ", cover, category_id, teacher_id";
        $values = ":title, :slug, :description, " . ($isTextContent ? ":content" : ":video") . ", :cover, :category_id, :teacher_id";

        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";

        $data = [
            ":title" => $this->title,
            ":slug" => strtolower(preg_replace('/[^\p{L}\p{N}]/u', '-', $this->title)),
            ":description" => $this->description,
            ($isTextContent ? ":content" : ":video") => $isTextContent ? $this->content : $this->video,
            ":cover" => $this->cover,
            ":category_id" => $this->categoryId,
            ":teacher_id" => $this->teacherId,
        ];

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $error) {
            echo "Failed to add course: " . $error->getMessage();
            return false;
        }

        $courseId = $this->pdo->lastInsertId();

        foreach ($this->tags as $tagId) {
            $this->addTagsToCourse($courseId, $tagId);
        }
        return $courseId;
    }

    public function updateCourse(int $id)
    {
        // $contentColumn = $this->content !== null ? "content = :content" : "video = :video";
    
        $sql = "UPDATE $this->table 
                SET 
                    title = :title, 
                    slug = :slug, 
                    description = :description, 
                    video = :video, 
                    content = :content, 
                    cover = :cover, 
                    category_id = :category_id, 
                    teacher_id = :teacher_id 
                WHERE id = :id";
    
        $data = [
            ":title" => $this->title,
            ":slug" => strtolower(preg_replace('/[^\p{L}\p{N}]/u', '-', $this->title)),
            ":description" => $this->description,
            // $this->content !== null ? ":content" : ":video" => $this->content !== null ? $this->content : $this->video,
            ":video" => $this->video !== null ? $this->video : NULL,
            ":content" => $this->content !== null ? $this->content : NULL,
            ":cover" => $this->cover,
            ":category_id" => $this->categoryId,
            ":teacher_id" => $this->teacherId,
            ":id" => $id,
        ];
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($data);
    
            $this->removeTagsFromArticle($id); 
            foreach ($this->tags as $tagId) {
                $this->addTagsToCourse($id, $tagId);
            }
    
            return $result;
        } catch (PDOException $error) {
            echo "Failed to update course: " . $error->getMessage();
            return false;
        }
    }
    

    public function readAllCourses($status) {
        $sql = "SELECT 
        c.*,  
        u.firstName, 
        u.lastName,
        u.picture,
        cat.name AS category_name, 
        GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
      FROM courses c
      JOIN users u ON c.teacher_id = u.id
      LEFT JOIN categories cat ON c.category_id = cat.id
      LEFT JOIN course_tags ct ON c.id = ct.course_id
      LEFT JOIN tags t ON ct.tag_id = t.id
      WHERE c.status = :status
      GROUP BY c.id, u.firstName, u.lastName, cat.name
      ORDER BY c.created_at DESC
      LIMIT 0,6;";

        $data = [
            ":status" => $status
        ];
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            error_log("Database error: " . $error->getMessage());
            return false;
        }
    }
    public function readCourseById() {
        if (empty($this->id)) {
            echo ("Course ID is not set.");
        }
    
        $sql = "SELECT 
        c.*,  
        u.firstName, 
        u.lastName, 
        cat.name AS category_name, 
        GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
      FROM courses c
      JOIN users u ON c.teacher_id = u.id
      LEFT JOIN categories cat ON c.category_id = cat.id
      LEFT JOIN course_tags ct ON c.id = ct.course_id
      LEFT JOIN tags t ON ct.tag_id = t.id
      WHERE c.id = :id
      GROUP BY c.id, u.firstName, u.lastName, cat.name
      ORDER BY c.id;";

        $data = [
            ":id" => $this->id
        ];
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            error_log("Database error: " . $error->getMessage());
            return false;
        }
    }

    private function removeTagsFromArticle($id)
    {
        $sql = "DELETE FROM course_tags WHERE course_id = :course_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':course_id' => $id]);
    }
    
    private function addTagsToCourse(int $courseId, int $tagId)
    {
        $sql = "INSERT INTO course_tags (course_id, tag_id) VALUES (:course_id, :tag_id)";
        $data = [
            ":course_id" => $courseId,
            ":tag_id" => $tagId
        ];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $error) {
            echo "Failed to insert data into course_tags table: " . $error->getMessage();
        }
    }

    public function updateCourseStatus($status) {
        $sql = "UPDATE courses SET status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([
            ':status' => $status,
            ':id' => $this->id
        ]);
        return $check;
    }

    public function deleteCourse()
    {
        $sql = "DELETE FROM courses WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $check = $stmt->execute([':id' => $this->id]);
        return $check;
    }
}
