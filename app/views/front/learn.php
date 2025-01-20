<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\CourseController;

$courseController = new CourseController();
$id = $_GET["courseId"];
$course = $courseController->readCourseById($id);
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
    <title><?= $course["title"] ?></title>
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
                                <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
                                    <li class="menu_item"><a href="./createcourse/new.php">
                                            <span><i class="fa-solid fa-newspaper"></i></span>
                                            <span>Create post</span>
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
    <main class="leaning_main-page">
        <div class="learning__page">
            <div class="course__detailes-lr">
                <div class="courseTeacher">
                    <div class="teacher__picture-c">
                        <?php
                        if (isset($course["picture"])): ?>
                            <img src="<?= $course["picture"] ?> " alt="">
                        <?php else: ?>
                            <span><?= substr($course["firstName"], 0, 1) . substr($course["lastName"], 0, 1) ?></span>
                        <?php endif ?>
                    </div>
                    <div class="teacher__name-c">
                        <span>
                            <p><?= $course["firstName"] . " " . $course["lastName"] ?></p>
                        </span>
                    </div>
                </div>
                <div class="course__title-lr">
                    <h3><?= $course["title"] ?></h3>
                </div>
            </div>
            <?php 
            if(isset($course["video"])):?>
            <div class="course__video">
                <iframe src="<?= $course["video"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <?php else: ?>
                <div class="course__description-lr">
                    <p><?= $course["content"] ?></p>
                </div>
            <?php endif?>
        </div>
    </main>
    <script src="../../../assets/js/main.js"></script>
</body>

</html>