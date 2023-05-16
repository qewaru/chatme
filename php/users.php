<?php
    session_start();
    include_once "config.php";
    
    // Searching for all users in DB except current user + searching only for online users in DB
    $currentUser = $_SESSION['unique_id'];
    $sql = "SELECT * FROM userslist WHERE NOT unique_id = {$currentUser}";
    $sqlQuery = mysqli_query($connection, $sql);

    $sqlOnline = "SELECT * FROM userslist WHERE status = 'Online'";
    $onlineUsers = mysqli_query($connection, $sqlOnline);
    
    $phpOutput = "";

    // Checking if there is only one user at all/online on webiste
    if (mysqli_num_rows($sqlQuery) == 0 || mysqli_num_rows($onlineUsers) == 0) {
        $phpOutput = '
            <div class="no-users">
                <p>No users found :(</p>
            </div>
        ';
    } else if (mysqli_num_rows($sqlQuery) > 0 || $onlineUsers > 1) {
        // If there is signed up users or online users
        // code is getting data about message history and
        // setting "output" as HTML code
        while ($rows = mysqli_fetch_assoc($sqlQuery))
        $phpOutput .= '
                <a href="chat.php?unique_id='. $rows['unique_id'] .'">
                    <div class="user-info">
                        <img src="./user_images/'. $rows['image'] .'" alt="">
                        <div class="user-details">
                            <p class="user-name">'. $rows['name'] . " " . $rows['surname'] .'</p>
                            <p class="other-user-status">'. $rows['status'] .'</p>
                        </div>
                    </div>
                </a>
        ';
    }

    echo $phpOutput
?>