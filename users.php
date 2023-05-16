<?php
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ChatMe | User Page</title>
</head>
<body>
    <?php
        include_once "php/config.php";
        $sql = mysqli_query($connection, "SELECT * FROM userslist WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
            $rowData = mysqli_fetch_assoc($sql);
        }
    ?>
    <div class="main-container">
        <section class="users">
            <header>
                <div class="user-info">
                    <img src="user_images/<?php echo $rowData['image'] ?>" alt="">
                    <div class="user-details">
                        <p class="user-name"><?php echo $rowData['name'] . " " .  $rowData['surname'] ?></p>
                        <p class="user-state"><?php echo $rowData['status'] ?></p>
                    </div>
                </div>
                <a href="login.php" class="logout">Logout</a>
            </header>
            <div class="search-bar">
                <input class="input-search" type="text" placeholder="Search for user...">
                <button class="btn-search">
                    <img class="img-search" src="./images/icon-search.png" alt="search">
                </button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>

    <script src="scripts/users.js"></script>
    <script src="scripts/logout.js"></script>

</body>
</html>