
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
                        <a href="./articles.php">
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
            
            <div class="pending__articles">
                <div class="heading">
                    <h1>Pending courses</h1>
                </div>

                <div class="pend__articles-content">
                <ul class="pend__articles-list">
                    <?php 
                    if (!empty($articles)) {
                        foreach ($articles as $article): ?>
                            <li class="pend__articles-card">
                                <?php 
                                if ($article["featuredImage"] !== NULL): ?>
                                    <div class="pend__article-cover">
                                        <img src="../<?= $article["featuredImage"] ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="art__btm">
                                    <div class="artc__auhtor">
                                        <div class="author__picture-ad">
                                            <span><?= substr($article["firstName"], 0, 1) . substr($article["lastName"], 0, 1) ?></span>
                                        </div>
                                        <div class="atcrl__dets">
                                            <div class="author__fullname">
                                                <p><?= $article["firstName"] . " " . $article["lastName"] ?></p>
                                            </div>
                                            <div class="date__created-ar">
                                                <p><?= date('Y-m-d', strtotime($article["createdAt"])) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pend__article-title">
                                        <h4><?= $article["title"] ?></h4>
                                    </div>
                                    <div class="article__tags-ar">
                                        <ul>
                                            <?php 
                                            $tags = array_map('trim', explode(",", $article["tags"])); 
                                            foreach ($tags as $tag): ?>
                                                <li>
                                                    <span>#<?= $tag ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="article__content-ar">
                                        <p><?= $article["content"] ?></p>
                                    </div>
                                    <div class="acc_ref-article">
                                        <div class="accept_art pend_btn">
                                            <a href="./articles.php?action=accept&artcId=<?= $article["articleId"] ?>">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        </div>
                                        <div class="refuse_art pend_btn">
                                            <a href="./articles.php?action=deleteArticle&articleId=<?= $article["articleId"] ?>">
                                                <i class="fa-solid fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; 
                    } else { ?>
                        <div class="no__articles-pend">
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
