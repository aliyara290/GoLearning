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

  <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

  <section class="relative bg-[url('../../../assets/images/home-hero.jpg')] bg-cover bg-center bg-no-repeat w-full h-dvh flex items-center justify-center">
    <div class="absolute w-full h-full top-0 left-0 z-20 bg-[#00000080]"></div>
    <!-- <div class="flex items-center gap-3">

    </div> --> 
    <div class="mx-auto max-w-3xl text-center relative z-30">
      <h1
        class="text-white text-3xl font-extrabold sm:text-6xl"
      >
      Join Thousands of Learners Who are Working Towards their Career Goals with Coursera Plus.
      </h1>

      <p class="text-white mx-auto mt-4 max-w-xl sm:text-3xl/relaxed">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
        numquam ea!
      </p>

      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <?php 
        if(isset($_SESSION["user"])):?>
        <a
          class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
          href="./coursesList.php"
        >
          Get Started
        </a>
        <?php else:?>
          <a
          class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
          href="./login.php"
        >
          Login
        </a>
        <?php endif?>
        <a
          class="block w-full rounded border border-blue-600 px-12 py-6 text-2xl font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
          href="#"
        >
          Learn More
        </a>
      </div>
    </div>

  </section>




  <script src="../../../assets/js/main.js"></script>
</body>

</html>