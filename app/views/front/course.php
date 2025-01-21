<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\CourseController;
use App\Controllers\StudentController;

$id = $_GET["id"];
$student_id = $_SESSION["user"]["userId"];
$courseController = new CourseController();
$coursePost = $courseController->readCourseById($id);
$studentController = new StudentController();
$studentController->enrollInCourse($id);
$isEnrolled = $studentController->isEnrolled($student_id, $id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/css/front/style.css" />
  <link rel="stylesheet" href="../../../assets/css/front/output.css" />
  <script
    src="https://kit.fontawesome.com/f01941449c.js"
    crossorigin="anonymous"></script>
  <title><?= $coursePost["title"] ?></title>
</head>

<body>

  <header class="header_content">
    <div class="left__side-nav">
      <div class="logo">
        <a href="./index.php">
          <h1><span>Go</span>Learning</h1>
        </a>
      </div>
    </div>
    </div>
    <nav class="navbar_content">
      <ul class="links_list">
        <?php if (isset($_SESSION["user"])): ?>
          <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
            <li class="page_link">
              <a href="./course/new.php">
                <button class="button__comp">Create course</button>
              </a>
            </li>
          <?php endif ?>
          <li class="page_link">
            <div class="user_picture user__pic-nav">
              <div class="u__pic">
                <?php
                if (isset($_SESSION["user"]["picture"])): ?>
                  <img src="<?= $_SESSION["user"]["picture"] ?>" alt="<?= $_SESSION["user"]["fullName"] ?>">
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
                  <a href="./profile/user.php" class="acc_us">
                    <span> <?= $_SESSION["user"]["fullName"] ?> </span>
                    <span> @<?= $_SESSION["user"]["fullName"] ?> </span>
                  </a>
                </li>
                <div class="acc__line"></div>

                <li class="menu_item"><a href="./setting/profile.php">
                    <span><i class="fa-solid fa-gear"></i></span>
                    <span>Setting</span>
                  </a></li>
                <?php
                if ($_SESSION["user"]["role"] === "student"): ?>
                  <li class="menu_item"><a href="./myCourses/">
                      <span><i class="fa-solid fa-book"></i></span>
                      <span>My Courses</span>
                    </a>
                  </li>
                <?php
                endif;
                ?>
                <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
                  <li class="menu_item"><a href="./course/new.php">
                      <span><i class="fa-solid fa-newspaper"></i></span>
                      <span>Create course</span>
                    </a></li>
                  <li class="menu_item"><a href="./statistic/statistic.php">
                      <span><i class="fa-solid fa-chart-simple"></i></span>
                      <span>Statistic</span>
                    </a></li>

                <?php endif ?>
                <div class="acc__line"></div>
                <li class="menu_item">
                  <a href="../../controllers/Logout.php">
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
              <a href="./login.php">
                <button class="button__comp button__border">Sign in</button>
              </a>
            </li>
            <li class="page_link">
              <a href="./register.php">
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

  <div class="article__page-content">
    <main class="article__content">
      <?php
      if (isset($coursePost["cover"])): ?>
        <div class="art_pic">
          <img src="<?= $coursePost["cover"] ?>" alt="cover" />
        </div>
      <?php
      endif;
      ?>
      <div class="article__content-det">
        <div class="art_details">
          <div class="art__author">
            <div class="author__pic">
              <?php
              if (isset($coursePost["picture"])): ?>
                <img src="<?= $coursePost["picture"] ?>" alt="<?= $coursePost["firstName"] . " " . $coursePost["lastName"] ?>" />
              <?php
              else:
              ?>
                <span><?= substr($coursePost["firstName"], 0, 1) . substr($coursePost["lastName"], 0, 1) ?></span>
              <?php
              endif;
              ?>
            </div>
            <div class="author__det">
              <div class="author__name">
                <a href="">
                  <h5><?= $coursePost["firstName"] . " " . $coursePost["lastName"] ?></h5>
                </a>
              </div>
            </div>
          </div>
          <div class="art__title">
            <h1>
              <?= $coursePost["title"] ?>
            </h1>
          </div>
          <div class="article__tags-ar" style="display: flex; flex-direction: column; gap: 5px;">
            <div class="">
              <strong style="font-size: 1.6rem;">Skills you'll gain: </strong>
            </div>
            <ul>
              <?php
              $tags = array_map('trim', explode(",", $coursePost["tags"]));
              foreach ($tags as $tag): ?>
                <li>
                  <span>#<?= htmlspecialchars($tag) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="article__description">
            <h4 class="text-4xl font-bold pb-4">Course overview:</h4>
            <p class="text-[var(--gray)]"><?= $coursePost["description"] ?></p>
          </div>
        </div>
      </div>
    </main>

    <aside class="aside__content-cd">
      <div class="aside__content-card">
        <div class="artc__background"></div>
        <header class="art_user_header">
          <div class="art__user-pic">
            <?php
            if (isset($coursePost["picture"])): ?>
              <img src="<?= $coursePost["picture"] ?>" alt="<?= $coursePost["firstName"] . " " . $coursePost["lastName"] ?>" />
            <?php
            else:
            ?>
              <span><?= substr($coursePost["firstName"], 0, 1) . substr($coursePost["lastName"], 0, 1) ?></span>
            <?php
            endif;
            ?>
          </div>
          <div class="art_header-details">
            <div class="art__header-fullname">
              <a href="#">
                <h1><?= $coursePost["firstName"] . " " . $coursePost["lastName"] ?></h1>
              </a>
            </div>
            <div class="acc__line"></div>
            <div class="art__header-bottom">
              <div class="header__bottom-joi">
                <span><i class="fa-solid fa-calendar-days"></i></span>
                <span>
                  Joined on
                  <span><?= date('Y-m-d', strtotime($coursePost["joined"])) ?></span>
                </span>
              </div>
            </div>
          </div>
        </header>
      </div>
      <?php
      if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "student"): ?>
        <?php
        if ($isEnrolled): ?>
          <div class="aside__content-card enroll-card">
            <div class="enroll_heading">
              <h3>You are already enrolled</h3>
            </div>
            <div class="enroll_button">
              <a href="./learn.php?courseId=<?= $coursePost['id'] ?>">
                <button class="button__comp">
                  Go to Course
                </button>
              </a>
            </div>
          </div>
        <?php else: ?>
          <div class="aside__content-card enroll-card">
            <div class="enroll_heading">
              <h3>Enroll in this course</h3>
            </div>
            <div class="enroll_button">
              <form action="course.php" method="post">
                <input type="hidden" name="courseId" value="<?= $coursePost["id"] ?>">
                <input type="hidden" name="studentId" value="<?= $_SESSION["user"]["userId"] ?>">
                <button type="submit" class="button__comp">
                  Enroll now
                </button>
              </form>
            </div>
          </div>
        <?php endif ?>
      <?php endif ?>
    </aside>
  </div>
  <footer class="footer">
    <div class="footer-container">
      <p class="footer-text">&copy; 2025 <span class="footer-brand">Medium</span>. All rights reserved.</p>
      <div class="footer-links">
        <a href="#" class="footer-link">Privacy Policy</a>
        <span class="footer-divider">|</span>
        <a href="#" class="footer-link">Terms of Service</a>
        <span class="footer-divider">|</span>
        <a href="#" class="footer-link">Contact</a>
      </div>
      <div class="footer-social">
        <ul class="social_links">
          <li class="social_link">
            <a href="#">
              <i class="fa-brands fa-facebook-square"></i>
            </a>
          </li>
          <li class="social_link">
            <a href="#">
              <i class="fa-brands fa-instagram-square"></i>
            </a>
          </li>
          <li class="social_link">
            <a href="#">
              <i class="fa-brands fa-twitter-square"></i>
            </a>
          </li>
          <li class="social_link">
            <a href="#">
              <i class="fa-brands fa-linkedin"></i>
            </a>
          </li>
          <li class="social_link">
            <a href="#">
              <i class="fa-brands fa-twitch"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="../../../assets/js/main.js"></script>
</body>

</html>