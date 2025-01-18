<?php
require __DIR__ . "/../../controllers/UserController.php";
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