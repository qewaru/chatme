<?php
    session_start();
    // Checking if user is logged in
    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        // Getting values from HTML input tags with ids of current user and chat user

        $outgoingValue = $_SESSION['unique_id'];
        $incomingValue = mysqli_escape_string($connection, $_POST['incoming_id']);

        $phpOutput = "";

        // Setting query to find messages in DB by incoming or outgoing message ids
        $sql = "SELECT * FROM messages WHERE (outgoing_id = {$outgoingValue} AND incoming_id = {$incomingValue})
                OR outgoing_id = {$incomingValue} AND incoming_id = {$outgoingValue} ORDER BY msg_id DESC";
        $sqlQuery = mysqli_query($connection, $sql);

        // If there is any messages, they will be displayed through "while" loop
        if (mysqli_num_rows($sqlQuery) > 0) {
            while ($rows = mysqli_fetch_assoc($sqlQuery)) {

                // If outgoing id is equal to current user outgoing id,
                // then current user is sender
                // If else - user is reciever
                if ($rows['outgoing_id'] === $outgoingValue) {
                    $phpOutput .= '
                        <div class="msg outgoing">
                            <div class="details">
                                <p>'. $rows['msg_text'] .'</p>
                            </div>
                        </div>
                    ';
                } else {
                    $phpOutput .= '
                        <div class="msg incoming">
                            <div class="details">
                                <p>'. $rows['msg_text'] .'</p>
                            </div>
                        </div>
                    ';
                }
            }
        } else {
            echo "No messages was found";
        }
    } else {
        header("./login.php");
    }
    echo $phpOutput;
?>