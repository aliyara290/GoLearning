<?php session_start(); ?>
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

  <section class="relative bg-[url('../../../assets/images/home-hero.jpg')] bg-cover bg-center bg-no-repeat w-full h-dvh flex items-center justify-center">
    <div class="absolute w-full h-full top-0 left-0 z-20 bg-[#00000080]"></div>
    <div class="mx-auto max-w-6xl text-center relative z-30">
      <h1
        class="text-white text-3xl font-extrabold sm:text-6xl">
        Join Thousands of Learners Who are Working Towards their Career Goals with GoLearning.
      </h1>

      <p class="text-white mx-auto mt-4 max-w-4xl sm:text-3xl/relaxed">
      Join thousands of learners on GoLearning and access unlimited courses to achieve your career goals. Upgrade your skills and grow with expert guidance!
      </p>

      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <?php
        if (isset($_SESSION["user"])): ?>
          <a
            class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
            href="./coursesList.php">
            Get Started
          </a>
        <?php else: ?>
          <a
            class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
            href="./login.php">
            Login
          </a>
        <?php endif ?>
        <a
          class="block w-full rounded border border-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
          href="./coursesList.php">
          Explore our courses
        </a>
      </div>
    </div>

  </section>
  <script src="../../../assets/js/main.js"></script>
</body>

</html>