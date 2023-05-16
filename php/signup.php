<?php
    session_start();
    // Uploading information from "config.php" file
    include_once "config.php";

    // Escaping special characters from users input to prevent errors in database
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $surname = mysqli_real_escape_string($connection, $_POST['surname']);
    $login = mysqli_real_escape_string($connection, $_POST['login']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Checking if all fields are not empty
    if (!empty($name) && !empty($surname) && !empty($login) && !empty($password)) {
        // With "preg_match" function code checks if login has only allowed symbols
        if (preg_match('/^[a-zA-Z0-9_]{4,20}$/', $login)) {

            // Getting data about existing login
            $sqlCheck = mysqli_query($connection, "SELECT * FROM userslist WHERE login = '{$login}'");
            
            // Checking if login already exists
            if (mysqli_num_rows($sqlCheck) > 0) {
                echo "$login already exists";
            } else {
                // Checking if image is uploaded
                if (isset($_FILES['image'])) {
                    $imageName = $_FILES['image']['name'];
                    $imageType = $_FILES['image']['type'];
                    $tempName = $_FILES['image']['tmp_name'];

                    // Dividing image file name in two parts - before and after dot sybmol + getting extension name
                    $imageExploded = explode('.', $imageName);
                    $imageExt = end($imageExploded);
                    
                    // Initializing "ext" array that contains strings with names of allowed extensions
                    // and checking if users uploaded file is in correct extension
                    $ext = ['jpg', 'jpeg', 'png'];
                    if (in_array($imageExt, $ext) === true) {
                        $newImageName = $login.$imageName;
                        
                        // Checking if image is moved in directory successfully, 
                        // if so, changing user status to "Online" and generating user ID
                        if (move_uploaded_file($tempName, "../user_images/".$newImageName)) {
                            
                            $status = "Online";
                            $userID = mt_rand(100000, 999999);

                            // Inserting user data into database
                            $sql = mysqli_query($connection, "INSERT INTO userslist (unique_id, name, surname, login, password, image, status)
                                                                VALUES ({$userID}, '{$name}', '{$surname}', '{$login}', '{$password}', '{$newImageName}', '{$status}')");
                            
                            // Cheking if data was inserted successfuly
                            // Retriving information from user data row
                            // Using session
                            if ($sql) {
                                $_SESSION['unique_id'] = $userID;
                                echo "Success";
                            } else {
                                echo "Technical error" .mysqli_error($connection);
                            }
                        }

                    } else {
                        echo "File extension is not 'jpg', 'jpeg' or 'png'!";
                    }
                } else {
                    echo "Select an image.";
                }
            }
        }
    } else {
        echo "Some of fields are empty!";
    }
?>