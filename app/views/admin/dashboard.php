<?php session_start(); ?>
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
                    <li class="page_item active">
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
                        <span></span>
                    </a>
                    <div class="welcome">
                        <h1>~ Welcome <?= $_SESSION["user"]["fullName"] ?><span>👋</span></h1>
                    </div>
                    <a href="../../controllers/Logout.php">
                        <span>
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                    </a>
                </nav>
            </header>
            <div class="project__statistics">
                <div class="heading">
                    <h1>Website statistics</h1>
                </div>
                <div class="statistics__cards">
                    <ul class="statistics__list">
                        <!-- <li class="statistic__card">
                            <span><i class="fa-solid fa-user"></i> Users: </span>
                            <span></span>
                        </li> -->
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-newspaper"></i> Active posts: </span>
                            <span>45</span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-hourglass-start"></i> Pending posts: </span>
                            <span>56</span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-tag"></i> Tags: </span>
                            <span>67</span>
                        </li>
                        <li class="statistic__card">
                            <span><i class="fa-solid fa-layer-group"></i> Categories: </span>
                            <span>78</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="charts" style="padding: 0 3rem;">
                <div class="heading">
                    <h1>Charts</h1>
                </div>
                <div class="statistics_charts">
                    <div class="chart__card"></div>
                    <div class="chart__card"></div>
                </div>
            </div>
            <div class="table-container" style="padding: 0 3rem;">
                <div class="heading">
                    <h1>Top 5 courses</h1>
                </div>
                <table class="user-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-header">title</th>
                            <th class="table-header">date posted</th>
                            <th class="table-header">views</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        <tr class="table-row">
                            <td class="table-data">who i'm I?</td>
                            <td class="table-data">2024-06-05</td>
                            <td class="table-data">231</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>