<?php
session_start();
require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\CourseController;
use App\Controllers\CategoryController;

$id = $_GET["courseId"];
$courseController = new CourseController();
$data = $courseController->readCourseById($_GET["courseId"]);
$courseController->updateCourse($id, $data["cover"]);

$tagController = new TagController();
$tags = $tagController->readAllTags();

$categoryController = new CategoryController();
$categories = $categoryController->readAllCategories();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../../assets/css/front/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
  <script
    src="https://kit.fontawesome.com/f01941449c.js"
    crossorigin="anonymous"></script>
  <title>Dev.to platform</title>
</head>

<body>


  <main class="create__article">

    <div class="create__article-content">
      <form method="post" class="article__form" enctype="multipart/form-data">
        <div class="art_pic">
          <img src="<?= $data["cover"] ?>" alt="" />
        </div>
        <input type="hidden" name="teacherId" value="<?= $_SESSION['user']['userId'] ?>">
        <div class="custom-file-input">
          <label for="courseCover" class="file-label">
            <button class="file-button" style="background-color: green;">New cover</button>
            <span class="file-name">No file selected</span>
          </label>
          <input type="file" id="file-upload" name="new-courseCover" class="file-input" />
        </div>
        <div class="create_article-title">
          <textarea name="new-courseTitle" autocomplete="off" id="courseTitle" placeholder="New post title here... *"><?= $data["title"] ?></textarea>
        </div>
        <div class="course_description">
          <div class="art_heading">
            <h4>Content *</h4>
          </div>
          <textarea name="new-courseDescription" id="courseDescription" placeholder="Type your course description here..."><?= $data["description"] ?></textarea>
        </div>
        <div class="body_choix">
          <div class="art_heading">
            <h4>Course body *</h4>
          </div>
          <select name="new-select__choix" class="select__choix" required>
            <option value="video" <?php echo ($data["video"] !== null) ? 'selected' : ''; ?>>Video</option>
            <option value="text" <?php echo ($data["video"] === null) ? 'selected' : ''; ?>>Text</option>
          </select>
        </div>
        <div class="video__option <?php echo ($data['video'] !== null) ? 'active' : ''; ?>">
          <div class="art_heading">
            <h4>Video URL</h4>
          </div>
          <input type="text" class="clr_vl" name="new-videoOption" value="<?= $data["video"] ?>" placeholder="video url here...">
        </div>
        <div class="text__option <?php echo ($data["content"] !== null) ? 'active' : ''; ?>">
          <div class="art_heading">
            <h4>Content</h4>
          </div>
          <textarea name="new-TextOptionContent" class="clr_vl" id="art__content-d" placeholder="Type your course content here..."><?= $data["content"] ?></textarea>
        </div>

        <div class="tags__select">
          <div class="art_heading">
            <h4>Tags *</h4>
          </div>
          <select name="new-courseSelectedTags[]" multiple>
            <?php
            $selectedTags = explode(', ', $data['tags']);

            foreach ($tags as $tag): ?>
              <option value="<?= $tag['id'] ?>"
                <?= in_array($tag['name'], $selectedTags) ? 'selected' : '' ?>>
                <?= $tag['name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="category__select">
          <div class="art_heading">
            <h4>Categories *</h4>
          </div>
          <select name="new-category_id" id="artcl__tags">
            <option disabled>Select Category</option>
            <?php
            foreach ($categories as $category):
              // Check if the current category is the selected one for the course
              $isSelected = ($category["id"] === $data["category_id"]);
            ?>
              <option value="<?= $category["id"] ?>" <?= $isSelected ? 'selected' : '' ?>>
                <?= htmlspecialchars($category["name"]) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>



        <div class="button__style">
          <button type="submit" name="create_course" style="background-color: green;">
            Update course
          </button>
        </div>
      </form>
    </div>
  </main>
  <script src="../../../../assets/js/main.js"></script>
</body>

</html>