<?php
    include_once "config.php";
    $searchValue = mysqli_escape_string($connection, $_POST['searchValue']);

    $sql = mysqli_query($connection, "SELECT * FROM userslist WHERE name LIKE '%{$searchValue}%' OR surname LIKE '%{$searchValue}%'");
    $phpOutput = "";
    if (mysqli_num_rows($sql) > 0) {
        $rows = mysqli_fetch_assoc($sql);
        $phpOutput .= '
                <a href="chat.php?unique_id='. $rows['unique_id'] .'">
                    <div class="user-info">
                        <img src="./user_images/'. $rows['image'] .'" alt="">
                        <div class="user-details">
                            <p class="user-name">'. $rows['name'] . " " . $rows['surname'] .'</p>
                            <p class="user-last-message">test message</p>
                        </div>
                    </div>
                </a>
        ';
    } else {
        $phpOutput .= '
                <div class="no-users">
                    <p>No users found :(</p>
                </div>
        ';
    }

    echo $phpOutput;
?>