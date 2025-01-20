<?php session_start() ?>
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
  <main class="statistic_page-contnet">

    <section class="global_statistics-cards">
      <ul class="g_prf-cards">
        <li>
          <span>Total students:</span>
          <span>234</span>
        </li>
        <li>
          <span>Total students:</span>
          <span>234</span>
        </li>
        <li>
          <span>Total students:</span>
          <span>234</span>
        </li>
        <li>
          <span>Total students:</span>
          <span>234</span>
        </li>
      </ul>
    </section>
    <search class="chars__cards-tr">
      <div class="char__statistic">
      <canvas id="playersByPosition" width="600" height="400"></canvas>
      </div>
    </search>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
        // Data
        const playersByPositionData = {
            labels: ["course", "fzef","fzeqf","zrdf","zrsdv","vdfs","zbn"],
            datasets: [{
                label: 'Players by Position',
                data: [2,3,6,9,6,5,29], // Example data
                backgroundColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderWidth: 1,
                borderRadius: 20,
            }]
        };
    
        // Chart Configurations
        const playersByPositionConfig = {
            type: 'bar',
            data: playersByPositionData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Players by Position' }
                }
            }
        };

      
        new Chart(document.getElementById('playersByPosition'), playersByPositionConfig);
    </script>
  <script src="../../../../assets/js/main.js"></script>
</body>

</html>