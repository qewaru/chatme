<?php
    $connection = mysqli_connect("localhost", "root", "", "chatMe");
    if (!$connection) {
        echo "Error" . mysqli_connect_error();
    }
?>