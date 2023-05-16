<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ChatMe | Log in</title>
</head>
<body>
    <div class="main-container">
        <section class="form signup">
            <header class="title">Log in</header>
            <form action="#" class="login-form">
                <div class="input-field">
                    <span>Login</span>
                    <input type="text" name="login" placeholder="Your login" required>
                </div>
                <div class="input-field">
                    <span>Password</span>
                    <div class="input-password">
                        <input type="password" name="password" placeholder="Your password" required>
                        <img class="btn-show-hide" src="./images/icon-eye-open.png">
                    </div>
                </div>
                <div class="btn-submit-container">
                    <button class="btn-create">Conitnue</button>
                </div>
            </form>
            <div class="login-link">
                <span>Not yet signed up? <a href="index.php">Sign-up now</a></span>
            </div>
        </section>
    </div>

    <script src="scripts/show-hide.js"></script>
    <script src="scripts/login.js"></script>

</body>
</html>