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
        <div class="success_msg">
        <h1>You successfully register, know sign in😊</h1>
        <a href="./login.php">
            <button class="button__comp">Log in</button>
        </a>
      </div>
    </section>
<script src="../../../assets/js/main.js"></script>
</body>
</html>