<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ChatMe | Sign Up</title>
</head>
<body>
    <div class="main-container">
        <section class="form signup">
            <header class="title">ChatMe Messenger</header>
            <form action="#" class="signup-form" enctype="multipart/form-data">
                <div class="name-details">
                    <div class="input-field">
                        <span>Name</span>
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="input-field">
                        <span>Surname</span>
                        <input type="text" name="surname" placeholder="Your Surname" required>
                    </div>
                </div>
                <div class="input-field">
                    <span>New Login</span>
                    <input type="text" name="login" placeholder="Create a login" required>
                </div>
                <div class="input-field password">
                    <span>New Password</span>
                    <div class="input-password">
                        <input type="password" name="password" placeholder="Create a password" required>
                        <img class="btn-show-hide" src="./images/icon-eye-open.png">
                    </div>
                </div>
                <div class="input-field input-image">
                    <span>Select Profile image</span>
                    <input class="input-file" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div>
                <div class="btn-submit-container">
                    <button class="btn-create">Create Account</button>
                </div>
            </form>
            <div class="login-link">
                <span>Already have an account? <a href="login.php">Log-in now</a></span>
            </div>
        </section>
    </div>
    <script src="scripts/show-hide.js"></script>
    <script src="scripts/signup.js"></script>
</body>
</html>