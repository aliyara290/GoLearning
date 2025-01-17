
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/css/dashboard/style.css" />
    <script
      src="https://kit.fontawesome.com/f01941449c.js"
      crossorigin="anonymous"
    ></script>
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
                    <span>
                            <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                </a>
                </nav>
            </header>
            
            <div class="pending__courses">
                <div class="heading">
                    <h1>Pending courses</h1>
                </div>

                <div class="pend__courses-content">
                <ul class="pend__courses-list">
                    <?php 
                    if (!empty($courses)) {
                        foreach ($courses as $course): ?>
                            <li class="pend__courses-card">
                                <?php 
                                if ($course["featuredImage"] !== NULL): ?>
                                    <div class="pend__course-cover">
                                        <img src="../<?= $course["featuredImage"] ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="art__btm">
                                    <div class="artc__auhtor">
                                        <div class="author__picture-ad">
                                            <span><?= substr($course["firstName"], 0, 1) . substr($course["lastName"], 0, 1) ?></span>
                                        </div>
                                        <div class="atcrl__dets">
                                            <div class="author__fullname">
                                                <p><?= $course["firstName"] . " " . $course["lastName"] ?></p>
                                            </div>
                                            <div class="date__created-ar">
                                                <p><?= date('Y-m-d', strtotime($course["createdAt"])) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pend__course-title">
                                        <h4><?= $course["title"] ?></h4>
                                    </div>
                                    <div class="course__tags-ar">
                                        <ul>
                                            <?php 
                                            $tags = array_map('trim', explode(",", $course["tags"])); 
                                            foreach ($tags as $tag): ?>
                                                <li>
                                                    <span>#<?= $tag ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="course__content-ar">
                                        <p><?= $course["content"] ?></p>
                                    </div>
                                    <div class="acc_ref-course">
                                        <div class="accept_art pend_btn">
                                            <a href="./courses.php?action=accept&artcId=<?= $course["courseId"] ?>">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="refuse_art pend_btn">
                                            <a href="./courses.php?action=deletecourse&courseId=<?= $course["courseId"] ?>">
                                                <i class="fa-solid fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; 
                    } else { ?>
                        <div class="no__courses-pend">
                            <p>No pending courses to show!</p>
                        </div>
                    <?php } ?>
                </ul>

                </div>
            </div>
        </main>
    </div>
  </body>
</html>
