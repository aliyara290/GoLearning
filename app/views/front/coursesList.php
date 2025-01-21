<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\CourseController;

$courseController = new CourseController();
$limit = 6;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
if (isset($_GET["search"])) {
    if ($_GET["search"] === "") {
        $courses = $courseController->readAllCourses("active", $page, $limit);
    } else {
        $courses = $courseController->searchForCourse();
    }
} else {
    $courses = $courseController->readAllCourses("active", $page, $limit);
}
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
    <title>Dev.to platform</title>
</head>

<body>
    <header class="header_content">
        <div class="left__side-nav">
            <div class="logo">
                <a href="./index.php">
                    <h1><span>Go</span>Learning</h1>
                </a>
            </div>
            <div class="search__bar">
                <form action="coursesList.php" method="GET" class="search__form-ds">
                    <input type="text" name="search" placeholder="Search for courses..." />
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
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

    <div class="blog__content">
        <aside class="left__side">
            <div class="left__side-content">
                <div class="pages__links">
                    <ul class="a_pages-links">
                        <li class="a_page-link active">
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-house"></i>
                                </span>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="a_page-link">
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-code color_1"></i>
                                </span>
                                <span>DEV++</span>
                            </a>
                        </li>
                        <li class="a_page-link">
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-microchip color_3"></i>
                                </span>
                                <span>Back-end</span>
                            </a>
                        </li>
                        <li class="a_page-link">
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-heart-circle-check color_2"></i>
                                </span>
                                <span>Front-end</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="follow_us">
                    <div class="heading-a">
                        <h2>Follow us:</h2>
                    </div>
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
        </aside>
        <main class="main__content">
            <div class="c-heading">
                <h2>Our popular courses</h2>
            </div>
            <?php
            if (isset($_GET["search"]) && $_GET["search"] !== ""): ?>
                <ul class="articles__list">
                    <?php
                    if ($courses > 0) : ?>
                        <?php
                        foreach ($courses as $course): ?>
                            <li class="pending__course">
                                <a href="../front/course.php?id=<?= $course["id"] ?>">
                                    <div class="course__cover">
                                        <img src="<?= $course["cover"] ?>" alt="">
                                    </div>
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
                                    <div class="course__title-c">
                                        <h3><?= $course["title"] ?></h3>
                                    </div>
                                    <div class="course__skills-c">
                                        <p><strong>Skills you'll gain: </strong><span style="text-transform:capitalize;"><?= $course["tags"] ?></span></p>
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
            <?php else: ?>
                <ul class="articles__list">
                    <?php
                    if ($courses["totalRecords"] > 0) : ?>
                        <?php
                        foreach ($courses["records"] as $course): ?>
                            <li class="pending__course">
                                <a href="../front/course.php?id=<?= $course["id"] ?>">
                                    <div class="course__cover">
                                        <img src="<?= $course["cover"] ?>" alt="">
                                    </div>
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
                                    <div class="course__title-c">
                                        <h3><?= $course["title"] ?></h3>
                                    </div>
                                    <div class="course__skills-c">
                                        <p><strong>Skills you'll gain: </strong><span style="text-transform:capitalize;"><?= $course["tags"] ?></span></p>
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
            <?php endif ?>
            <?php
            if (!isset($_GET["search"])): ?>
                <div class="pagination-container">
                    <nav>
                        <ul class="pagination-list">
                            <?php if ($courses['currentPage'] > 1): ?>
                                <li>
                                    <a href="?page=<?= $courses['currentPage'] - 1 ?>" class="pagination-link pagination-prev">Prev</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $courses['totalPages']; $i++): ?>
                                <li>
                                    <a href="?page=<?= $i ?>" class="pagination-link <?= $i == $courses['currentPage'] ? 'active' : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($courses['currentPage'] < $courses['totalPages']): ?>
                                <li>
                                    <a href="?page=<?= $courses['currentPage'] + 1 ?>" class="pagination-link pagination-next">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif ?>
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
        </main>
    </div>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>