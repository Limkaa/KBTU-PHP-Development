<?php
session_start();
include "../db.php";

if (
    isset($_POST['phone']) && isset($_POST['password'])
    && isset($_POST['fullname']) && isset($_POST['confirm_password']) && isset($_POST['email'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $phone = $new_str = str_replace(" ", '', validate($_POST['phone']));
    $pass = validate($_POST['password']);
    $id = $_SESSION['user_id'];

    $confirm_pass = validate($_POST['confirm_password']);
    $fullname = validate($_POST['fullname']);
    $email = validate($_POST['email']);
    $user_data = 'phone=' . $phone . '&fullname=' . $fullname;

    


    if (empty($phone)) {
        header("Location: ../../signup.php?error=Phone is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: ../../signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($confirm_pass)) {
        header("Location: ../../signup.php?error=Confirmation Password is required&$user_data");
        exit();
    } else if (empty($fullname)) {
        header("Location: ../../signup.php?error=Full Name is required&$user_data");
        exit();
    } else if ($pass !== $confirm_pass) {
        header("Location: ../../signup.php?error=The confirmation password  does not match&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: ../../signup.php?error=Email is required&$user_data");
        exit();
    } else {

        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE phone='$phone' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../../signup.php?error=The phone is taken try another&$user_data");
            exit();
        } else {

            $sql2 = "INSERT INTO users(phone, password, fullname, email, avatar_id) VALUES('$phone', '$pass', '$fullname', '$email', 8)";
            $result2 = mysqli_query($conn, $sql2);
            $user_id = $conn->insert_id;
            
            $random_issuer_query = "SELECT * FROM card_issuers ORDER BY RAND() LIMIT 1";
            $random_issuer = mysqli_query($conn, $random_issuer_query) -> fetch_assoc();
            $issuer_id = $random_issuer['id'];
            $card_number = $random_issuer['prefix'].rand(100, 999).rand(1000, 9999).rand(1000, 9999).rand(1000, 9999);

            $card_create_query = "INSERT INTO cards (user_id, number, type, issuer, balance, is_active) VALUES ($user_id, '$card_number', 1, $issuer_id, 0, 1);";
            echo $card_create_query;
            mysqli_query($conn, $card_create_query);

            if ($result2) {

                header("Location: ../../signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: ../../signup.php?error=unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: ../../signup.php");
    exit();
}
