<?php
require __DIR__ . "/../../controllers/UserController.php";
if (isset($_SESSION['user'])) {
  header("location: /app/views/front/index.php");
}

use App\Controllers\UserController;
$userController = new UserController();
$userController->login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/css/front/style.css" />
  <title>Sign in</title>
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

  <section class="form__section">

    <div class="form__content">
      <div class="section__heading">
        <h1>
          Sign in to your account
        </h1>
      </div>
      <form class="log__form" action="./login.php" method="POST">
        <div class="inp__frm">
          <label for="login_identifier">Email or username</label>
          <input type="text" name="login_identifier" id="login_identifier" class="" placeholder="email or username" required="">
        </div>
        <div class="inp__frm">
          <label for="login_password" class="">Password</label>
          <input type="password" name="login_password" id="login_password" placeholder="password" class="" required="">
        </div>
        <div class="sit__prg">
          <a href="#" class="">Forgot password?</a>
        </div>
        <div class="submit__btn">
          <button type="submit" name="login">Sign in</button>
        </div>
        <div class="sit__prg">
          <p>
            Don’t have an account yet? <a href="./register.php" class="">Sign up</a>
          </p>
        </div>
      </form>
    </div>

  </section>
  <script src="../../../assets/js/main.js"></script>
</body>

</html>