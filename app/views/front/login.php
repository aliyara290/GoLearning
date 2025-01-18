<?php 
require __DIR__ . "/../../controllers/UserController.php";
use App\Controllers\UserController;

$userController = new UserController();
$userController->login();
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
                    Sign in to your account
                </h1>
            </div>
              <form class="log__form" action="./login.php" method="POST">
                  <div class="inp__frm">
                      <label for="login_identifier">Email or username</label>
                      <input type="text" name="login_identifier" id="login_identifier" class="" placeholder="email or username" required="">
                  </div>
                  <div class="inp__frm">
                      <label for="login_password" class="">Password</label>
                      <input type="password" name="login_password" id="login_password" placeholder="password" class="" required="">
                  </div>
                  <div class="sit__prg">
                      <a href="#" class="">Forgot password?</a>
                  </div>
                  <div class="submit__btn">
                    <button type="submit" name="login">Sign in</button>
                  </div>
                  <div class="sit__prg">
                    <p>
                        Don’t have an account yet? <a href="./register.php" class="">Sign up</a>
                    </p>
                  </div>
              </form>
          </div>
      
</section>
<script src="../../../assets/js/main.js"></script>
</body>
</html>