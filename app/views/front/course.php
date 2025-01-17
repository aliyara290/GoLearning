<?php 
session_start();
require __DIR__ . "/../../controllers/courseController.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/css/front/style.css" />
    <script
      src="https://kit.fontawesome.com/f01941449c.js"
      crossorigin="anonymous"
    ></script>
    <title>Sign in</title>
  </head>
  <body>
  <?php include "../../includes/header.php" ?>

    <div class="course__page-content">
    <main class="course__content">
      <?php
      if(isset($coursePost["featuredImage"])): ?>
      <div class="art_pic">
          <img src="../<?= $coursePost["featuredImage"] ?>" alt="cover" />
      </div>
        <?php 
          endif;
        ?>
    <div class="course__content-det">
        <div class="art_details">
        <div class="art__author">
        <div class="author__pic">
                      <?php 
                        if(isset($coursePost["picture"])): ?>
                        <img src="../<?= $coursePost["picture"]?>" alt="<?= $coursePost["firstName"] . " " . $coursePost  ["lastName"]?>" />
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
                  <div class="art__date">
                    <span><?= date('Y-m-d', strtotime($coursePost["createdAt"])) ?></span>
                  </div>
                </div>
              </div>
            <div class="art__title">
                <h1>
                    <?= $coursePost["title"] ?>
                </h1>
            </div>
            <div class="course__tags-ar">
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
            <div class="course__description">
                <p><?= $coursePost["content"] ?></p>
            </div>
        </div>
    </div>
</main>

      <aside class="author__details"> 
        <div class="artc__background"></div>
        <header class="art_user_header">
          <div class="art__user-pic">
          <span><?= substr($coursePost["firstName"], 0, 1) . substr($coursePost["lastName"], 0, 1) ?></span>
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
