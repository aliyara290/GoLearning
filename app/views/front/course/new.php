<?php
session_start();
require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Controllers\TagController;
use App\Controllers\CourseController;
use App\Controllers\CategoryController;

$courseController = new CourseController();
$courseController->createCourse();

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
      <form action="./new.php" method="post" class="article__form" enctype="multipart/form-data">
        <input type="hidden" name="teacherId" value="<?= $_SESSION['user']['userId'] ?>">
        <div class="custom-file-input">
          <label for="courseCover" class="file-label">
            <button class="file-button">Upload File</button>
            <span class="file-name">No file chosen</span>
          </label>
          <input type="file" id="file-upload" name="courseCover" class="file-input" />
        </div>
        <div class="create_article-title">
          <textarea name="courseTitle" autocomplete="off" id="courseTitle" placeholder="New post title here... *"></textarea>
        </div>
        <div class="course_description">
          <div class="art_heading">
            <h4>Content *</h4>
          </div>
          <textarea name="courseDescription" id="courseDescription" placeholder="Type your course description here..."></textarea>
        </div>
        <div class="body_choix">
          <div class="art_heading">
            <h4>Course body *</h4>
          </div>
          <select name="select__choix" class="select__choix" required>
            <option selected disabled>Select option</option>
            <option value="video">Video</option>
            <option value="text">Text</option>
          </select>
        </div>
        <div class="video__option">
          <div class="art_heading">
            <h4>Video URL</h4>
          </div>
          <input type="text" name="videoOption" placeholder="video url here...">
        </div>
        <div class="text__option">
          <div class="art_heading">
            <h4>Content</h4>
          </div>
          <textarea name="TextOptionContent" id="art__content-d" placeholder="Type your course content here..."></textarea>
        </div>
        <div class="tags__select">
          <div class="art_heading">
            <h4>Tags *</h4>
          </div>
          <select name="courseSelectedTags[]" multiple>
            <option disabled selected>Select Tags</option>
            <?php
            foreach ($tags as $tag): ?>
              <option value=<?= $tag["id"] ?>><?= $tag["name"] ?></option>
            <?php
            endforeach;
            ?>
          </select>
        </div>
        <div class="tags__select">
          <div class="art_heading">
            <h4>Categories *</h4>
          </div>
          <select name="category_id" id="artcl__tags">
            <option disabled selected>Select Category</option>
            <?php
  
            foreach ($categories as $category): ?>
              <option value=<?= $category["id"] ?>><?= $category["name"] ?></option>
            <?php
            endforeach;
            ?>
          </select>
        </div>


        <div class="button__style">
          <button type="submit" name="create_course">
            Post
          </button>
        </div>
      </form>
    </div>
  </main>
  <script src="../../../../assets/js/main.js"></script>
</body>

</html>