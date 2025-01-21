<?php
require __DIR__ . "/../../controllers/UserController.php";

if (isset($_SESSION['user'])) {
    header("location: /app/views/front/index.php");
}
use App\Controllers\UserController;

$userController = new UserController();
$userController->register();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/front/style.css" />
    <title>Sign in</title>
</head>

<body>
    <header class="header_content">
        <div class="left__side-nav">
            <div class="logo">
                <a href="./index.php">
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
                                    <a href="./profile/user.php" class="acc_us">
                                        <span> <?= $_SESSION["user"]["fullName"] ?> </span>
                                        <span> @<?= $_SESSION["user"]["fullName"] ?> </span>
                                    </a>
                                </li>
                                <div class="acc__line"></div>

                                <li class="menu_item"><a href="./setting/profile.php">
                                        <span><i class="fa-solid fa-gear"></i></span>
                                        <span>Setting</span>
                                    </a></li>
                                <?php if ($_SESSION["user"]["role"] === "teacher"): ?>
                                    <li class="menu_item"><a href="./createcourse/new.php">
                                            <span><i class="fa-solid fa-newspaper"></i></span>
                                            <span>Create post</span>
                                        </a></li>
                                    <li class="menu_item"><a href="./statistic/statistic.php">
                                            <span><i class="fa-solid fa-chart-simple"></i></span>
                                            <span>Statistic</span>
                                        </a></li>
                                <?php endif ?>
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
    <section class="form__section">
        <div class="form__content">
            <div class="section__heading">
                <h1>
                    Sign up
                </h1>
            </div>
            <form class="log__form" action="./register.php" method="post">
                <div class="reg__row">
                    <div class="inp__frm">
                        <label for="u_firstName">First name</label>
                        <input type="text" name="u_firstName" id="u_firstName" placeholder="First Name" required="">
                    </div>
                    <div class="inp__frm">
                        <label for="u_lastName">Last name</label>
                        <input type="text" name="u_lastName" id="u_lastName" placeholder="email" required="">
                    </div>
                </div>
                <div class="roleOptions_st">
                    <div class="inp__frm">
                        <label>Select Your Role</label>
                        <select name="u_role" id="u_role">
                            <option selected disabled>Select option</option>
                            <option value="teacher">Register as teacher</option>
                            <option value="student">Register as student</option>
                        </select>
                    </div>

                </div>
                <div class="inp__frm">
                    <label for="u_email">Email</label>
                    <input type="email" name="u_email" id="u_email" placeholder="email" required="">
                </div>
                <div class="inp__frm">
                    <label for="u_username">Username</label>
                    <input type="text" name="u_username" id="u_username" placeholder="username" required="">
                </div>
                <div class="inp__frm">
                    <label for="u_password" class="">Password</label>
                    <input type="password" name="u_password" id="u_password" placeholder="password" class="" required="">
                </div>
                <!-- <div class="inp__frm">
                <label for="signup_confirm_password" class="">Confirm password</label>
                <input type="password" name="signup_confirm_password" id="signup_confirm_password" placeholder="confirm password" class="" required="">
            </div> -->
                <div class="sit__prg">
                    <p>
                        Already have an account? <a href="./login.php" class="">Log in</a>
                    </p>
                </div>
                <div class="submit__btn">
                    <button type="submit" name="register" class="">Sign up</button>
                </div>

            </form>
        </div>
    </section>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>