<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../assets/css/front/style.css" />
    <script
      src="https://kit.fontawesome.com/f01941449c.js"
      crossorigin="anonymous"
    ></script>
    <title>Dev.to platform</title>
  </head>
  <body>
    <header class="header_content">
      <div class="left__side-nav">
        <div class="logo">
            <a href="../index.php">
                <h1>Medium</h1>
              </a>
        </div>
        <div class="search__bar">
          <input type="text" placeholder="Search for course..." />
        </div>
      </div>
      <nav class="navbar_content">
        <ul class="links_list">
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
          <li class="page_link">
            <a href="#">
              <button class="button__comp">Create course</button>
            </a>
          </li>
          <li class="page_link">
            <div class="user_picture user__pic-nav">
            <div class="u__pic">
                <?php 
                if(isset($_SESSION["user"]["userPic"])):?>
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
                  <a href="./profile/user.html" class="acc_us">
                    <span> Ali Yara </span>
                    <span> @aliyara29 </span>
                  </a>
                </li>
                <div class="acc__line"></div>

                <li class="menu_item"><a href="#">Setting</a></li>
                <li class="menu_item"><a href="#">Create post</a></li>
                <li class="menu_item"><a href="#">Statistic</a></li>
                <div class="acc__line"></div>
                <li class="menu_item">
                  <button class="logout_us">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Log out</span>
                  </button>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </header>


    <script src="../../../../assets/js/main.js"></script>
  </body>
</html>
