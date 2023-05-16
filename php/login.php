<?php
    session_start();
    // Uploading information from "config.php" file
    include_once "config.php";

    // Escaping special characters from users input to prevent errors in database
    $login = mysqli_real_escape_string($connection, $_POST['login']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (!empty($login) && !empty($password)) {

        // Checking if login is existing in DB
        $sqlCheck = mysqli_query($connection, "SELECT * FROM userslist WHERE login = '{$login}'");
        
        if (mysqli_num_rows($sqlCheck) > 0) {
            
            // Fetching the row and extracting password
            $row = mysqli_fetch_assoc($sqlCheck);
            $dbPassword = $row['password'];
            
            // Changing user status to "Online"
            $updateStatus = mysqli_query($connection, "UPDATE userslist SET status = 'Online' WHERE login = '{$row['login']}'");

            // Checking if password from DB matches with user-input password
            if ($dbPassword == $password) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "Success";
            } else {
                echo "Password is incorrect!";
            }
        } else {
            echo "Such login doesn't exist!";
        }
    } else {
        echo "Some of fields are empty!";
    }
?>