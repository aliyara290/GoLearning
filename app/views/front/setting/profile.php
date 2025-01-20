<?php
session_start();
require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\Controllers\UserProfileController;
$userProfileController = new UserProfileController();
$userProfileController->updataProfileData();
$portfolio = $userProfileController->displayUserPortfolio();
if (!isset($_SESSION["user"])) {
  header("Location: /deV.io/src/views/front/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../../assets/css/front/style.css" />
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
                <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
                  <li class="menu_item"><a href="../createcourse/new.php">
                      <span><i class="fa-solid fa-newspaper"></i></span>
                      <span>Create post</span>
                    </a></li>
                  <li class="menu_item"><a href="../statistic/statistic.php">
                      <span><i class="fa-solid fa-chart-simple"></i></span>
                      <span>Statistic</span>
                    </a></li>
                <?php endif ?>
                <div class="acc__line"></div>
                <li class="menu_item">
                  <a href="../../../controllers/Logout.php">
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
              <a href="../login.php">
                <button class="button__comp button__border">Sign in</button>
              </a>
            </li>
            <li class="page_link">
              <a href="../register.php">
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

  <main class="setting__content">
    <div class="setting__pages">
      <div class="pages__links">
        <ul class="a_pages-links">
          <li class="a_page-link active">
            <a href="./profile.php">
              <span>
                <i class="fa-solid fa-face-smile" style="color: #ffc800"></i>
              </span>
              <span>Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="profile__setting">
      <form action="profile.php" method="post" class="setting__form" enctype="multipart/form-data">
        <section class="set__prof-content">
          <div class="set__heading">
            <h2>User</h2>
          </div>
          <div class="grid__rows">
            <div class="inp__row">
              <label for="user__firstname">First name</label>
              <input
                type="text"
                name="user__firstname"
                id="user__firstname"
                placeholder="First name"
                value="<?= $portfolio["firstName"] ?>" />
            </div>
            <div class="inp__row">
              <label for="user__lastname">Last name</label>
              <input type="text" name="user__lastname" id="user__lastname" value="<?= $portfolio["lastName"] ?>" placeholder="Last name" />
            </div>
            <div class="inp__row">
              <label for="user__email">Email</label>
              <input type="text" name="user__email" id="user__email" value="<?= $portfolio["email"] ?>" placeholder="Email" />
            </div>
            <div class="inp__row">
              <label for="user__username">Username</label>
              <input type="text" name="user__username" id="user__username" value="<?= $portfolio["username"] ?>" placeholder="Username" />
            </div>
          </div>
          <div class="user__up-pic">
            <label for="userPicture">Profile image</label>
            <div class="set__pic-row">
              <div class="profile__picture-preview">
                <?php

                if (isset($portfolio["picture"])): ?>
                  <img
                    src="<?= $portfolio["picture"] ?>"
                    alt="Ali Yara" />
                <?php
                else:
                ?>
                  <span><?= substr($portfolio["firstName"], 0, 1) . substr($portfolio["lastName"], 0, 1) ?></span>
                <?php
                endif;
                ?>
              </div>
              <div class="custom-file-input">
                <label for="userPicture" class="file-label">
                  <span class="file-button">Upload File</span>
                  <span class="file-name">No file chosen</span>
                </label>
                <input type="file" id="file-upload" value="<?= $portfolio["picture"] ?>" name="userPicture" class="file-input" />
              </div>
            </div>
          </div>
        </section>

        <section class="set__prof-content">
          <div class="set__heading">
            <h2>Basic</h2>
          </div>
          <div class="grid__rows">
            <div class="inp__row">
              <label for="user__website">Website Link</label>
              <input
                type="text"
                name="user__website"
                id="user__website"
                placeholder="www.example.com"
                value="<?= $portfolio["website"] ?>" />
            </div>
            <div class="inp__row">
              <label for="user__work">Work</label>
              <input type="text" name="user__work" id="user__work" value="<?= $portfolio["work"] ?>" placeholder="Work" />
            </div>
          </div>
          <div class="user__up-pic">
            <label for="user__bio">Bio</label>
            <textarea name="user__bio" id="user__bio" placeholder="bio..."><?= $portfolio["bio"] ?></textarea>
          </div>
        </section>
        <div class="submit_btn">
          <button class="button__comp">Save Profile Information</button>
        </div>


      </form>
    </div>
  </main>
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

  <script src="../../../../assets/js/main.js"></script>
</body>

</html>