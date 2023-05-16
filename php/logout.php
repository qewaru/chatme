<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $status = "Offline now";
        $sql = mysqli_query($connection, "UPDATE userslist SET status = '{$status}' WHERE unique_id={$_SESSION['unique_id']}");
        session_unset();
    } else {
        header("location: ../login.php");
    }
?>