<?php
    header("Location: feedback.php");
    require('db.php');

    if (isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['feedback'])) {

        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($conn, $name);

        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);

        $text = stripslashes($_POST['feedback']);
        $text = mysqli_real_escape_string($conn, $text);

        $datetime = date('Y-m-d H:i:s');
        
        $query = "INSERT INTO `feedback` (name, datetime, text, email)
                    VALUES ('$name', '$datetime', '$text', '$email')";
        
        $result = mysqli_query($conn, $query);
    }
?>