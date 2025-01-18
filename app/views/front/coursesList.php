<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\CourseController;

$courseController = new CourseController();
$courses = $courseController->readAllCourses("active");
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
            <div class="search__for">
                <div class="search__bar">
                    <input type="text" id="searchQuery" placeholder="Search for courses..." onkeyup="liveSearch()" />
                </div>
                <!-- <div class="search__result" id="searchResults">
          <?php
            if (!empty($searchResult)) {
                foreach ($searchResult as $result) {
            ?>
              <div class="course__cont">
                <a href="./course.php?action=read&slug=<?= $result["slug"] ?>" class="course__result">
                  <div class="art__title-r">
                    <h4><?= htmlspecialchars($result["title"]) ?></h4>
                  </div>
                  <div class="art__date-r">
                    <span><?= date('Y-m-d', strtotime($result["createdAt"])) ?></span>
                  </div>
                </a>
              </div>
          <?php
                }
            }
            ?>
        </div> -->
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
                                <li class="menu_item"><a href="./createcourse/new.php">
                                        <span><i class="fa-solid fa-newspaper"></i></span>
                                        <span>Create post</span>

                                    </a></li>
                                <li class="menu_item"><a href="./statistic/statistic.php">
                                        <span><i class="fa-solid fa-chart-simple"></i></span>
                                        <span>Statistic</span>
                                    </a></li>
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
            <ul class="articles__list">
                <?php
                if (!empty($courses)) : ?>
                    <?php
                    foreach ($courses as $course): ?>
                        <li class="pending__course">
                            <a href="../front/course.php?slug=">
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
            <div class="flex items-center justify-center pb-10">
                <nav>
                    <ul class="inline-flex -space-x-px text-base h-10">
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                        </li>
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                        </li>
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="text-4xl flex items-center justify-center px-6 py-3 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
                        </li>
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
                        </li>
                        <li>
                            <a href="#" class="text-4xl flex items-center justify-center px-6 py-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Next</a>
                        </li>
                    </ul>
                </nav>

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
        </main>
    </div>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>