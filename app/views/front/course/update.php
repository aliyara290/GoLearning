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
<header class="header_content">
    <div class="left__side-nav">
      <div class="logo">
        <a href="../index.php">
          <h1><span>Go</span>Learning</h1>
        </a>
      </div>
    </div>
    </div>
    <nav class="navbar_content">
      <ul class="links_list">
        <?php if (isset($_SESSION["user"])): ?>
          <!-- <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
            <li class="page_link">
              <a href="./course/new.php">
                <button class="button__comp">Create course</button>
              </a>
            </li>
          <?php endif ?> -->
          <li class="page_link">
            <div class="user_picture user__pic-nav">
              <div class="u__pic">
                <?php
                if (isset($_SESSION["user"]["userPic"])): ?>
                  <img src="../<?= $_SESSION["user"]["picture"] ?>" alt="<?= $_SESSION["user"]["fullName"] ?>">
                <?php
                else:
                ?>
                  <span><?= substr($_SESSION["user"]["fullName"], 0, 1) ?></span>
                <?php
                endif;
                ?>
              </div>
            </div>
            <div class="acc_menu">
              <ul class="menu_list">
                <li class="menu_item">
                  <a href="../profile/user.php" class="acc_us">
                    <span> <?= $_SESSION["user"]["fullName"] ?> </span>
                    <span> @<?= $_SESSION["user"]["fullName"] ?> </span>
                  </a>
                </li>
                <div class="acc__line"></div>

                <li class="menu_item"><a href="../setting/profile.php">
                    <span><i class="fa-solid fa-gear"></i></span>
                    <span>Setting</span>
                  </a></li>
                <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
                  <li class="menu_item"><a href="../createcourse/new.php">
                      <span><i class="fa-solid fa-newspaper"></i></span>
                      <span>Create post</span>
                    </a></li>
                  <li class="menu_item"><a href="../statistic/statistic.php">
                      <span><i class="fa-solid fa-chart-simple"></i></span>
                      <span>Statistic</span>
                    </a></li>
                <?php endif ?>
                <div class="acc__line"></div>
                <li class="menu_item">
                  <a href="../../../controllers/Logout.php">
                    <button class="logout_us">
                      <i class="fa-solid fa-right-from-bracket"></i>
                      <span>Log out</span>
                    </button>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php else: ?>
          <div class="logs_buttons">
            <li class="page_link">
              <a href="../login.php">
                <button class="button__comp button__border">Sign in</button>
              </a>
            </li>
            <li class="page_link">
              <a href="../register.php">
                <button class="button__comp">Sign up</button>
              </a>
            </li>
          </div>
        <?php
        endif;
        ?>
      </ul>
    </nav>
  </header>

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