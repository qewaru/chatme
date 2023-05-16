<?php
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }

    include_once "php/config.php";
        $sql = mysqli_query($connection, "SELECT * FROM userslist WHERE unique_id = {$_GET['unique_id']}");
        $user_id = mysqli_real_escape_string($connection, $_GET['unique_id']);
        if (mysqli_num_rows($sql) > 0) {
            $rowData = mysqli_fetch_assoc($sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ChatMe | Chat Page</title>
</head>
<body>
    <div class="main-container">
        <section class="chat-container">
            <header>
                <a href="users.php" class="back-icon"><img src="./images/icon-left-arrow.png"></a>
                <img src="./user_images/<?php echo $rowData['image']?>" alt="">
                <div class="user-details">
                    <p class="user-name"> <?php echo $rowData['name'] . " " . $rowData['surname']?></p>
                    <p class="user-state"><?php echo $rowData['status']?></p>
                </div>
            </header>
            <div class="chat-area">

            </div>
            <form action="#" class="type-message" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="messageValue" class="input-message" placeholder="Type your message...">
                <button><img src="./images/icon-send.png"></button>
            </form>
        </section>
    </div>

    <script src="scripts/chat.js"></script>

</body>
</html>