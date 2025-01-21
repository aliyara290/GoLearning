<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\CourseController;
use App\Middleware\RoleMiddleware;
RoleMiddleware::handle(['admin']);

$courseController = new CourseController();

$limit = 6;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$courses = $courseController->readAllCourses("pending", $page, $limit);
$draftCourses = $courseController->readAllCourses("draft", $page, $limit);

if (isset($_GET["action"], $_GET["courseId"])) {
    $action = $_GET["action"];
    $courseId = filter_var($_GET["courseId"], FILTER_SANITIZE_NUMBER_INT);

    if ($courseId) {
        if ($action === "acceptCourse") {
            $courseController->updateCourseStatus($courseId, "active");
        } elseif ($action === "draftCourse") {
            $courseController->updateCourseStatus($courseId, "draft");
        } elseif ($action === "deleteCourse") {
            $check = $courseController->deleteCourse($courseId);
            if ($chech) {
                header("location: /app/views/admin/courses.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/css/dashboard/style.css" />
    <script
        src="https://kit.fontawesome.com/f01941449c.js"
        crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="pages__content">
        <aside class="side__content">
            <header class="aside__header">
                <a href="./dashboard.php">
                    <h1>MyBoard</h1>
                </a>
            </header>
            <div class="pages__links">
                <ul class="pages_list">
                    <li class="page_item ">
                        <a href="./dashboard.php">
                            <span><i class="fa-solid fa-chart-simple"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="page_item">
                        <a href="./users.php">
                            <span><i class="fa-solid fa-user"></i></span>
                            <span>users</span>

                        </a>
                    </li>
                    <li class="page_item active">
                        <a href="./courses.php">
                            <span><i class="fa-solid fa-newspaper"></i></span>
                            <span>Courses</span>

                        </a>
                    </li>
                    <li class="page_item">
                        <a href="./tags.php">
                            <span><i class="fa-solid fa-tag"></i></span>
                            <span>tags</span>

                        </a>
                    </li>
                    <li class="page_item">
                        <a href="./categories.php">
                            <span><i class="fa-brands fa-dev"></i></span>
                            <span>categories</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main__content">
            <header class="main__header">
                <nav class="navbar__content">
                    <a href="../front/index.php">
                        <span><i class="fa-solid fa-house"></i></span>
                    </a>
                    <a href="../../controllers/Logout.php">
                        <span style="display: flex; gap: 1rem; align-items: center;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p style="font-size: 1.4rem;">Disconnected</p>
                        </span>
                    </a>
                </nav>
            </header>

            <div class="pending__articles">
                <div class="heading">
                    <h1>Pending courses</h1>
                </div>

                <div class="pend__articles-content">
                    <ul class="pend__articles-list">
                        <?php
                        if (!empty($courses["records"])) : ?>
                            <?php
                            foreach ($courses["records"] as $course): ?>
                                <li class="pending__course">
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
                                        <a href="../front/course.php?slug=<?= $course["slug"] ?>">
                                            <h3><?= $course["title"] ?></h3>
                                        </a>
                                    </div>
                                    <div class="course__skills-c">
                                        <p><strong>Skills you'll gain: </strong><span style="text-transform:capitalize;"><?= $course["tags"] ?></span></p>
                                    </div>
                                    <div class="acc_ref-article">
                                        <div class="accept_art pend_btn">
                                            <a href="./courses.php?action=acceptCourse&courseId=<?= $course["id"] ?>">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="draft_art pend_btn">
                                            <a href="./courses.php?action=draftCourse&courseId=<?= $course["id"] ?>">
                                                <i class="fa-solid fa-box-archive"></i>
                                            </a>
                                        </div>
                                        <div class="refuse_art pend_btn">
                                            <a href="./courses.php?action=deleteCourse&courseId=<?= $course["id"] ?>">
                                                <i class="fa-solid fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php else: ?>
                            <div class="no__articles-pend">
                                <p>No pending courses to show!</p>
                            </div>
                        <?php endif ?>
                    </ul>
                </div>

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

            </div>
            <div class="pending__articles">
                <div class="heading">
                    <h1>Draft courses</h1>
                </div>

                <div class="pend__articles-content">
                    <ul class="pend__articles-list">
                        <?php
                        if (!empty($draftCourses["records"])) : ?>
                            <?php
                            foreach ($draftCourses["records"] as $course): ?>
                                <li class="pending__course">
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
                                        <a href="../front/course.php?slug=<?= $course["slug"] ?>">
                                            <h3><?= $course["title"] ?></h3>
                                        </a>
                                    </div>
                                    <div class="course__skills-c">
                                        <p><strong>Skills you'll gain: </strong><span style="text-transform:capitalize;"><?= $course["tags"] ?></span></p>
                                    </div>
                                    <div class="acc_ref-article">
                                        <div class="accept_art pend_btn">
                                            <a href="./courses.php?action=acceptCourse&courseId=<?= $course["id"] ?>">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="refuse_art pend_btn">
                                            <a href="./courses.php?action=deleteCourse&courseId=<?= $course["id"] ?>">
                                                <i class="fa-solid fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php else: ?>
                            <div class="no__articles-pend">
                                <p>No pending courses to show!</p>
                            </div>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="pagination-container">
                    <nav>
                        <ul class="pagination-list">
                            <?php if ($draftCourses['currentPage'] > 1): ?>
                                <li>
                                    <a href="?page=<?= $draftCourses['currentPage'] - 1 ?>" class="pagination-link pagination-prev">Prev</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $draftCourses['totalPages']; $i++): ?>
                                <li>
                                    <a href="?page=<?= $i ?>" class="pagination-link <?= $i == $draftCourses['currentPage'] ? 'active' : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($draftCourses['currentPage'] < $draftCourses['totalPages']): ?>
                                <li>
                                    <a href="?page=<?= $draftCourses['currentPage'] + 1 ?>" class="pagination-link pagination-next">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>

</html>