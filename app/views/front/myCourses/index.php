<?php
require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Controllers\StudentController;
use App\Middleware\RoleMiddleware;

RoleMiddleware::handle(['student']);
$studentController = new StudentController();
$courses = $studentController->viewMyCourses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../assets/css/front/style.css" />
    <link rel="stylesheet" href="../../../../assets/css/front/output.css" />
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
                <li class="page_link">
                    <div class="user_picture user__pic-nav">
                        <div class="u__pic">
                            <?php
                            if (isset($_SESSION["user"]["picture"])): ?>
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
                            <li class="menu_item"><a href="../myCourses/">
                                    <span><i class="fa-solid fa-book"></i></span>
                                    <span>My Courses</span>
                                </a>
                            </li>
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
            </ul>
        </nav>
    </header>

    <main class="mycourses__content">
        <div class="c-heading">
            <h2>My courses</h2>
        </div>
        <ul class="articles__list">
            <?php
            if (count($courses) > 0) : ?>
                <?php
                foreach ($courses as $course): ?>
                    <li class="pending__course">
                        <a href="../../front/learn.php?courseId=<?= $course["course_id"] ?>">
                            <div class="course__cover">
                                <img src="<?= $course["cover"] ?>" alt="">
                            </div>
                            <div class="course__title-c">
                                <h3><?= $course["title"] ?></h3>
                            </div>
                        </a>
                    </li>
                <?php endforeach ?>
            <?php else: ?>
                <div class="no__articles-pend">
                    <p>No pending courses to show!</p>
                </div>
            <?php endif ?>
        </ul>
    </main>

    <script src="../../../../assets/js/main.js"></script>
</body>

</html>