<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/css/front/style.css" />
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
          <h1>Medium</h1>

        </a>
      </div>
      <div class="search__for">
        <div class="search__bar">
          <input type="text" id="searchQuery" placeholder="Search for courses..." onkeyup="liveSearch()" />
        </div>
        <div class="search__result" id="searchResults">
          <div class="article__cont">
            <a href="./course.php?action=read&slug=" class="article__result">
              <div class="art__title-r">
                <h4></h4>
              </div>
              <div class="art__date-r">
                <span></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    </div>
    <nav class="navbar_content">
      <ul class="links_list">
        <li class="page_link">
          <a href="./course/new.php">
            <button class="button__comp">Create course</button>
          </a>
        </li>
        <li class="page_link">
          <div class="user_picture user__pic-nav">
            <div class="u__pic">
              <!-- <img src="../" alt=""> -->
              <span>AY</span>
            </div>
          </div>
          <div class="acc_menu">
            <ul class="menu_list">
              <li class="menu_item">
                <a href="./profile/user.php" class="acc_us">
                  <span>Ali Yara</span>
                  <span> @aliyara </span>
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
      </ul>
    </nav>
  </header>


  <div class="blog__content">
    <aside class="left__side">
      <div class="left__side-content">
        <div class="pages__links">
          <ul class="a_pages-links">
            <li class="a_page-link active">
              <a href="#">
                <span>
                  <i class="fa-solid fa-house"></i>
                </span>
                <span>Home</span>
              </a>
            </li>
            <li class="a_page-link">
              <a href="#">
                <span>
                  <i class="fa-solid fa-code color_1"></i>
                </span>
                <span>DEV++</span>
              </a>
            </li>
            <li class="a_page-link">
              <a href="#">
                <span>
                  <i class="fa-solid fa-microchip color_3"></i>
                </span>
                <span>Back-end</span>
              </a>
            </li>
            <li class="a_page-link">
              <a href="#">
                <span>
                  <i class="fa-solid fa-heart-circle-check color_2"></i>
                </span>
                <span>Front-end</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="follow_us">
          <div class="heading-a">
            <h2>Follow us:</h2>
          </div>
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
    </aside>
    <main class="main__content">
      <div class="articles__list">
        <div class="article__post">

          <div class="art_pic">
            <img src="../../../assets/images/home-hero.jpg" alt="" />
          </div>
          <div class="art_details">
            <div class="art__author">
              <div class="author__pic">
                <!-- <img src="../" alt="" /> -->
                <span>AY</span>
              </div>
              <div class="author__det">
                <div class="author__name">
                  <a href="">
                    <h5>Ali Yara</h5>
                  </a>
                </div>
                <div class="art__date">
                  <span>2025-03-30</span>
                </div>
              </div>
            </div>
            <div class="art__title">
              <a href="./course.php?action=read&slug=">
                <h1>
                  Why developers should learn JavaScript?
                </h1>
              </a>
            </div>
            <div class="article__tags-ar">
              <ul>
                <li>
                  <span>#Php</span>
                </li>
                <li>
                  <span>#Js</span>
                </li>
                <li>
                  <span>#C++</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
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
    </main>
    <aside class="right__side">
      <div class="right__side-content">
        <div class="heading-a">
          <h2>Most Viewed Posts</h2>
        </div>
        <div class="posts_r-side">
          <ul class="posts_list">

            <li class="post_details">
              <a href="" class="post__link">
                <div class="post_title">
                  <a href="./course.php?action=read&slug=">
                    <h3>
                      Why developers should learn JavaScript?
                    </h3>
                  </a>
                </div>
                <div class="post__views">
                  <span>
                    <i class="fa-solid fa-eye"></i>
                  </span>
                  <span>23</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
  </div>

  <script src="../../../assets/js/main.js"></script>
</body>

</html>