<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Middleware\RoleMiddleware;
RoleMiddleware::handle(['admin']);

$adminController = new AdminController();
$users = $adminController->getAllUers("pending");
$adminController->activeUser();
$adminController->suspendUser();
$adminController->deleteUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/css/dashboard/style.css" />
  <script
    src="https://kit.fontawesome.com/f01941449c.js"
    crossorigin="anonymous"></script>
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
            <a href="./courses.php">
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
            <span style="display: flex; gap: 1rem; align-items: center;">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p style="font-size: 1.4rem;">Disconnected</p>
            </span>
          </a>
        </nav>
      </header>

      <section class="users__table">
        <div class="heading">
          <h1>All active users</h1>
        </div>
        <div class="table-container">
          <table class="user-table">
            <thead class="table-head">
              <tr>
                <th class="table-header">Id</th>
                <th class="table-header">Full name</th>
                <th class="table-header">Email</th>
                <th class="table-header">Username</th>
                <th class="table-header">Date Joined</th>
                <th class="table-header">Role</th>
                <th class="table-header">Status</th>
                <th class="table-header">Manage</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <?php

              foreach ($users as $user): ?>
                <?php
                if ($user["status"] == "active"): ?>
                  <tr class="table-row">
                    <td class="table-data"><?= $user["id"] ?></td>
                    <td class="table-data"><?= $user["firstName"] . " " . $user["lastName"] ?></td>
                    <td class="table-data"><?= $user["email"] ?></td>
                    <td class="table-data"><?= $user["username"] ?></td>
                    <td class="table-data"><?= date('Y-m-d', strtotime($user["joined"])) ?></td>
                    <td class="table-data"><?= $user["role"] ?></td>
                    <td class="table-data"><?= $user["status"] ?></td>
                    <?php
                    if ($user["id"] !== 1): ?>
                      <td class="manage-col">
                        <span style="background-color: var(--blue);">
                          <a href="./users.php?action=suspendUser&usrId=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-lock"></i>
                          </a>
                        </span>
                        <span style="background-color: red;">
                          <a href="./users.php?action=deleteUser&userID=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </span>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endif ?>
              <?php
              endforeach;
              ?>
            </tbody>

          </table>
        </div>
      </section>
      <section class="users__table">
        <div class="heading">
          <h1>Pending teachers</h1>
        </div>

        <?php
        $hasPendingTeachers = false;

        foreach ($users as $user) {
          if ($user["role"] === "teacher" && $user["status"] === "pending") {
            $hasPendingTeachers = true;
            break;
          }
        }
        ?>
        <?php if ($hasPendingTeachers): ?>
          <div class="table-container">
            <table class="user-table">
              <thead class="table-head">
                <tr>
                  <th class="table-header">Id</th>
                  <th class="table-header">Full name</th>
                  <th class="table-header">Email</th>
                  <th class="table-header">Username</th>
                  <th class="table-header">Date Joined</th>
                  <th class="table-header">Role</th>
                  <th class="table-header">Status</th>
                  <th class="table-header">Manage</th>
                </tr>
              </thead>
              <tbody class="table-body">
                <?php

                foreach ($users as $user): ?>
                  <?php
                  if ($user["role"] == "teacher" && $user["status"] == "pending"): ?>
                    <tr class="table-row">
                      <td class="table-data"><?= $user["id"] ?></td>
                      <td class="table-data"><?= $user["firstName"] . " " . $user["lastName"] ?></td>
                      <td class="table-data"><?= $user["email"] ?></td>
                      <td class="table-data"><?= $user["username"] ?></td>
                      <td class="table-data"><?= date('Y-m-d', strtotime($user["joined"])) ?></td>
                      <td class="table-data"><?= $user["role"] ?></td>
                      <td class="table-data"><?= $user["status"] ?></td>
                      <td class="manage-col">
                        <span style="background-color: green;">
                          <a href="./users.php?action=activeUser&identifier=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-square-check"></i>
                          </a>
                        </span>
                        <span style="background-color: red;">
                          <a href="./users.php?action=deleteUser&userID=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </span>
                      </td>
                    </tr>
                  <?php endif ?>
                <?php
                endforeach;
                ?>
              </tbody>

            </table>
          </div>
        <?php else: ?>
          <div class="no__articles-pend">
            <p>No pending teachers to show!</p>
          </div>
        <?php endif ?>
      </section>

      <section class="users__table">
        <div class="heading">
          <h1>Suspended users</h1>
        </div>

        <?php
        $hasSuspendedUsers = false;

        foreach ($users as $user) {
          if ($user["status"] === "suspended") {
            $hasSuspendedUsers = true;
            break;
          }
        }
        ?>
        <?php if ($hasSuspendedUsers): ?>
          <div class="table-container">
            <table class="user-table">
              <thead class="table-head">
                <tr>
                  <th class="table-header">Id</th>
                  <th class="table-header">Full name</th>
                  <th class="table-header">Email</th>
                  <th class="table-header">Username</th>
                  <th class="table-header">Date Joined</th>
                  <th class="table-header">Role</th>
                  <th class="table-header">Status</th>
                  <th class="table-header">Manage</th>
                </tr>
              </thead>
              <tbody class="table-body">
                <?php

                foreach ($users as $user): ?>
                  <?php
                  if ($user["status"] == "suspended"): ?>
                    <tr class="table-row">
                      <td class="table-data"><?= $user["id"] ?></td>
                      <td class="table-data"><?= $user["firstName"] . " " . $user["lastName"] ?></td>
                      <td class="table-data"><?= $user["email"] ?></td>
                      <td class="table-data"><?= $user["username"] ?></td>
                      <td class="table-data"><?= date('Y-m-d', strtotime($user["joined"])) ?></td>
                      <td class="table-data"><?= $user["role"] ?></td>
                      <td class="table-data"><?= $user["status"] ?></td>
                      <td class="manage-col">
                        <span style="background-color: green;">
                          <a href="./users.php?action=activeUser&identifier=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-lock-open"></i>
                          </a>
                        </span>
                        <span style="background-color: red;">
                          <a href="./users.php?action=deleteUser&userID=<?= $user["id"] ?>" class="btn-table">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </span>
                      </td>
                    </tr>
                  <?php endif ?>
                <?php
                endforeach;
                ?>
              </tbody>

            </table>
          </div>
        <?php else: ?>
          <div class="no__articles-pend">
            <p>No suspended users to show!</p>
          </div>
        <?php endif ?>
      </section>
    </main>
  </div>
</body>

</html>