<?php 
session_start();
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
       
      </div>
      <nav class="navbar_content">
        <ul class="links_list">
          <li class="page_link">
            <a href="../course/new.php">
              <button class="button__comp">Create course</button>
            </a>
          </li>
          <li class="page_link">
            <div class="user_picture user__pic-nav">
            <div class="u__pic">
                <!-- <img src="" alt=""> -->
                  <span>AY</span>
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
        </ul>
      </nav>
    </header>
    <main class="setting__content">
      <div class="setting__pages">
        <div class="pages__links">
          <ul class="a_pages-links">
            <li class="a_page-link ">
              <a href="./profile.php">
                <span>
                  <i class="fa-solid fa-face-smile" style="color: #ffc800"></i>
                </span>
                <span>Profile</span>
              </a>
            </li>
            <li class="a_page-link active">
              <a href="./account.php">
                <span>
                  <i class="fa-solid fa-user-gear" style="color: #e713f6"></i>
                </span>
                <span>Account</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="profile__setting">
        <form action="" method="post" class="setting__form">
          <section class="set__prof-content">
            <div class="set__heading">
              <h2>Set new password</h2>
              <p>If your account was created using social account authentication, you may prefer to add an email log in. If you signed up with a social media account, please reset the password for your primary email address (ali.yara.fr@gmail.com) in order to enable this. Please note that email login is in addition to social login rather than a replacement for it, so your authenticated social account will continue to be linked to your account.</p>
            </div>
              <div class="inp__row">
                <label for="user__fisrtname">Current password</label>
                <input
                  type="text"
                  name="user__fisrtname"
                  id="user__fisrtname"
                  placeholder="Current password"
                />
              </div>
              <div class="inp__row">
                <label for="user__lastname">New password</label>
                <input type="text" name="user__lastname" id="user__lastname" placeholder="New password"/>
              </div>
              <div class="inp__row">
                <label for="user__lastname">Confirm new password</label>
                <input type="text" name="user__lastname" id="user__lastname" placeholder="Confirm new password" required/>
              </div>
          </section>
          <div class="submit_btn">
            <button class="button__comp" style="background-color: #057005;">Update password</button>
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
