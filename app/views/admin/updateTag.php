<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/css/dashboard/style.css" />
    <script
      src="https://kit.fontawesome.com/f01941449c.js"
      crossorigin="anonymous"
    ></script>
    <title>Dashboard</title>
  </head>
  <body>
    <div class="pages__content">
      <aside class="side__content">
        <header class="aside__header">
          <a href="./dashboard.php">
            <h1>MyBoard</h1>
          </a>
        </header>
        <div class="pages__links">
          <ul class="pages_list">
            <li class="page_item">
              <a href="./dashboard.php">
                <span><i class="fa-solid fa-chart-simple"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="page_item">
              <a href="./users.php">
                <span><i class="fa-solid fa-user"></i></span>
                <span>users</span>
              </a>
            </li>
            <li class="page_item">
              <a href="./articles.php">
                <span><i class="fa-solid fa-newspaper"></i></span>
                <span>Courses</span>
              </a>
            </li>
            <li class="page_item">
              <a href="./tags.php">
                <span><i class="fa-solid fa-tag"></i></span>
                <span>tags</span>
              </a>
            </li>
            <li class="page_item">
              <a href="./categories.php">
                <span><i class="fa-brands fa-dev"></i></span>
                <span>categories</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <main class="main__content">
      <header class="main__header">
                <nav class="navbar__content">
                <a href="../front/index.php">
                    <span><i class="fa-solid fa-house"></i></span>
                </a>
                <a href="../../controllers/Logout.php">
                    <span>
                            <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                </a>
                </nav>
            </header>

        <div class="cls__content">
          <div class="heading">
            <h1>Update tag</h1>
          </div>
          <div class="add__cls">
            <form action="updateTag.php" method="post" class="form__content">
              <div class="form__input">
                  <input type="hidden" value="Tag Name" name="tagId" />
                <label for="new_tag-name">New tag name</label>
                <input type="text" name="new_tag-name" placeholder="New tag name" />
              </div>
              <div class="submit_btn">
                <button type="submit" name="update" style="background-color: green;">Update</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
