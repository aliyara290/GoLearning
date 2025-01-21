<?php
// session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Controllers\CourseController;
use App\Controllers\TagController;
use App\Controllers\CategoryController;
use App\Middleware\RoleMiddleware;
RoleMiddleware::handle(['admin']);

$courseController = new CourseController();
$totalCourses = $courseController->readAllCourses("active", 1, 1);
$totalPendingCourses = $courseController->readAllCourses("pending", 1, 1);
$tagController = new TagController();
$totalTags = $tagController->readAllTags();
$categoryController = new CategoryController();
$totalCategories = $categoryController->readAllCategories();
$adminController = new AdminController();
$result = $adminController->countCoursesByCategory();
$labels = $result["labels"];
$counts = $result["counts"];
$topCourseMethod = $adminController->topCourse();
$topThreeTeachersMethode = $adminController->topThreeTeachers();
$topThreeTeachers = $topThreeTeachersMethode["labels"];
$topThreeTeachersCourses = $topThreeTeachersMethode["counts"];

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
                    <li class="page_item active">
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
                    <li class="page_item">
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
                        <span></span>
                    </a>
                    <div class="welcome">
                        <h1>~ Welcome <?= $_SESSION["user"]["fullName"] ?><span>👋</span></h1>
                    </div>
                    <a href="../../controllers/Logout.php">
                        <span style="display: flex; gap: 1rem; align-items: center;">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p style="font-size: 1.4rem;">Disconnected</p>
                        </span>
                    </a>
                </nav>
            </header>
            <div class="project__statistics">
                <div class="heading">
                    <h1>Website statistics</h1>
                </div>
                <div class="statistics__cards">
                    <ul class="statistics__list">
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-newspaper"></i> Total courses: </span>
                            <span><?= $totalCourses["totalRecords"] ?></span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-trophy"></i> <?= $topCourseMethod["course_title"] ?> </span>
                            <span><?= $topCourseMethod["total_students"] ?></span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-hourglass-start"></i> courses: </span>
                            <span><?= count($totalPendingCourses["records"]) ?></span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-tag"></i> Tags: </span>
                            <span><?= count($totalTags) ?></span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-layer-group"></i> Categories: </span>
                            <span><?= count($totalCategories) ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="charts" style="padding: 0 3rem;">
                <div class="heading">
                    <h1>Charts</h1>
                </div>
                <div class="statistics_charts">
                    <div class="chart__card">
                        <canvas id="courseBycategory" width="600" height="400"></canvas>
                    </div>
                    <div class="chart__card">
                        <canvas id="topThreeTeachers" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const courseBycategoryData = {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'course by category',
                data: <?= json_encode($counts) ?>, // Example data
                backgroundColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderWidth: 1,
                // borderRadius: 20,
            }]
        };
        const topThreeTeachersData = {
            labels: <?= json_encode($topThreeTeachers) ?>,
            datasets: [{
                label: 'Top 3 teachers',
                data: <?= json_encode($topThreeTeachersCourses) ?>, // Example data
                backgroundColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderWidth: 1,
                // borderRadius: 20,
            }]
        };
       

        
        const topThreeTeachersConfig = {
            type: 'doughnut',
            data: topThreeTeachersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 16,
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Top 3 teachers',
                        color: "#6d7ada",
                        font: {
                            size: 20
                        }
                    }
                }
            }
        };
        const courseBycategoryConfig = {
            type: 'doughnut',
            data: courseBycategoryData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 16,
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Course By Category',
                        color: "#6d7ada",
                        font: {
                            size: 20
                        }
                    }
                }
            }
        };



        new Chart(document.getElementById('courseBycategory'), courseBycategoryConfig);
        new Chart(document.getElementById('topThreeTeachers'), topThreeTeachersConfig);
    </script>
</body>

</html>