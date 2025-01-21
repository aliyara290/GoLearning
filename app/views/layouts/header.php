<!-- nested header  -->

<header class="header_content">
  <div class="left__side-nav">
    <div class="logo">
      <a href="../index.php">

        <h1><span>Go</span>Learning</h1>
      </a>
    </div>
  </div>
  <nav class="navbar_content">
    <ul class="links_list">
      <?php

      if (isset($_SESSION["user"])): ?>

        <!-- <li class="page_link">
            <a href="../course/new.php">
              <button class="button__comp">Create course</button>
            </a>
          </li> -->
        <li class="page_link">
          <div class="user_picture user__pic-nav">
            <div class="u__pic">
              <?php
              if (isset($_SESSION["user"]["userPic"])): ?>
                <img src="../../<?= $_SESSION["user"]["userPic"] ?>" alt="<?= $_SESSION["user"]["fullName"] ?>">
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
                  <span> Ali Yara </span>
                  <span> @aliyara29 </span>
                </a>
              </li>
              <div class="acc__line"></div>

              <li class="menu_item"><a href="../setting/profile.php">
                  <span><i class="fa-solid fa-gear"></i></span>
                  <span>Setting</span>
                </a></li>
              <li class="menu_item"><a href="./new.php">
                  <span><i class="fa-solid fa-newspaper"></i></span>
                  <span>Create post</span>

                </a></li>
              <!-- <li class="menu_item"><a href="./statistic/statistic.php">
                <span><i class="fa-solid fa-chart-simple"></i></span>
                <span>Statistic</span>
                </a></li> -->



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
      <div class="search__result" id="searchResults">
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
      </div>
    </div>
  </div>
  </div>
  <nav class="navbar_content">
    <ul class="links_list">
      <?php

      if (isset($_SESSION["user"])): ?>

        <li class="page_link">
          <a href="./course/new.php">
            <button class="button__comp">Create course</button>
          </a>
        </li>
        <li class="page_link">
          <div class="user_picture user__pic-nav">
            <div class="u__pic">
              <?php
              if (isset($_SESSION["user"]["userPic"])): ?>
                <img src="../<?= $_SESSION["user"]["userPic"] ?>" alt="<?= $_SESSION["user"]["fullName"] ?>">
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
                  <span> @<?= $_SESSION["user"]["username"] ?> </span>
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