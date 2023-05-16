<?php
    session_start();

    // Checking if user is logged in
    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        // Getting values from HTML input tags with ids of current user and
        // chat user + typed message value
        $outgoingValue = mysqli_escape_string($connection, $_POST['outgoing_id']);
        $incomingValue = mysqli_escape_string($connection, $_POST['incoming_id']);
        $messageValue = mysqli_escape_string($connection, $_POST['messageValue']);

        // Checking if message value is containing some information
        // then sending message, current user and chat-user ids to database
        if (!empty($messageValue)) {
            $sql = "INSERT INTO messages (incoming_id, outgoing_id, msg_text)
                    VALUES ('{$incomingValue}', '{$outgoingValue}', '{$messageValue}')";

            if (mysqli_query($connection, $sql)) {
                echo "Message saved";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Message is empty!";
        }
    } else {
        header("./login.php");
    }
?>