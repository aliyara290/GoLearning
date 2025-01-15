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
            <li class="page_item active">
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

        <section class="users__table">
          <div class="heading">
            <h1>All users</h1>
          </div>
          <div class="table-container">
            <table class="user-table">
              <thead class="table-head">
                <tr>
                  <th class="table-header">Full name</th>
                  <th class="table-header">Email</th>
                  <th class="table-header">Username</th>
                  <th class="table-header">Date Joined</th>
                  <th class="table-header">Work</th>
                  <th class="table-header">Role</th>
                  <th class="table-header">Manage</th>
                </tr>
              </thead>
              <tbody class="table-body">

                <tr class="table-row">
                  <td class="table-data">Ali</td>
                  <td class="table-data">Ali</td>
                  <td class="table-data">Ali</td>
                  <td class="table-data">Ali</td>
                  <td class="table-data">Ali</td>
                  <td class="table-data">Ali</td>
                  <td class="table-data manage-col">
                    <span>
                      <a href="./users.php?action=deleteUser&userId=" class="btn-table">
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
