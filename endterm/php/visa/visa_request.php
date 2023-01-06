<?php
    header("Location: visa.html");
    require('db.php');

    if (isset($_POST['name']) &&
        isset($_POST['surname']) &&
        isset($_POST['citizenship']) &&
        isset($_POST['country']) &&
        isset($_POST['date']) &&
        isset($_POST['phone']) &&
        isset($_POST['email'])) {

        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($conn, $name);

        $surname = stripslashes($_POST['surname']);
        $surname = mysqli_real_escape_string($conn, $surname);

        $citizenship = stripslashes($_POST['citizenship']);
        $citizenship = mysqli_real_escape_string($conn, $citizenship);

        $country = stripslashes($_POST['country']);
        $country = mysqli_real_escape_string($conn, $country);

        $date = stripslashes($_POST['date']);
        $date = mysqli_real_escape_string($conn, $date);

        $phone = stripslashes($_POST['phone']);
        $phone = mysqli_real_escape_string($conn, $phone);

        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        
        $query = "INSERT into `visa` (name, surname, citizenship, country, date, phone, email)
                    VALUES ('$name', '$surname', '$citizenship', '$country', '$date', '$phone', '$email')";
        
        $result = mysqli_query($conn, $query);
    }
?>