<header class="header_content">
  <div class="left__side-nav">
    <div class="logo">
      <a href="./index.html">
        <h1>Medium</h1>
      </a>
    </div>
  </div>
  <nav class="navbar_content">
    <ul class="links_list">
      <!-- Authenticated User Section -->
      <li class="page_link">
        <a href="./article/new.html">
          <button class="button__comp">Create Article</button>
        </a>
      </li>
      <li class="page_link">
        <div class="user_picture user__pic-nav">
          <div class="u__pic">
            <!-- Replace static user data with JS logic if needed -->
            <img src="../path/to/user-picture.jpg" alt="User Full Name">
            <!-- Or, use initials as fallback -->
            <!-- <span>A</span> -->
          </div>
        </div>
        <div class="acc_menu">
          <ul class="menu_list">
            <li class="menu_item">
              <a href="./profile/user.html" class="acc_us">
                <span>User Full Name</span>
                <span>@username</span>
              </a>
            </li>
            <div class="acc__line"></div>
            <li class="menu_item">
              <a href="./setting/profile.html">
                <span><i class="fa-solid fa-gear"></i></span>
                <span>Setting</span>
              </a>
            </li>
            <li class="menu_item">
              <a href="./createArticle/new.html">
                <span><i class="fa-solid fa-newspaper"></i></span>
                <span>Create post</span>
              </a>
            </li>
            <li class="menu_item">
              <a href="./statistic/statistic.html">
                <span><i class="fa-solid fa-chart-simple"></i></span>
                <span>Statistic</span>
              </a>
            </li>
            <div class="acc__line"></div>
            <li class="menu_item">
              <a href="#">
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
          <a href="./login.html">
            <button class="button__comp button__border">Sign in</button>
          </a>
        </li>
        <li class="page_link">
          <a href="./register.html">
            <button class="button__comp">Sign up</button>
          </a>
        </li>
      </div>
    </ul>
  </nav>
</header>
