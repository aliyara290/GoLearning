<?php 
require __DIR__ . "/../../controllers/UserController.php";
if (isset($_SESSION["user"])) {
    header("Location: /deV.io/src/views/front/index.php");
    exit();
  } 
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
<?php include "../../includes/header.php" ?>
    <section class="form__section">
      
          <div class="form__content">
            <div class="section__heading">
                <h1>
                    Sign in to your account
                </h1>
            </div>
              <form class="log__form" action="../../controllers/UserController.php" method="post">
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