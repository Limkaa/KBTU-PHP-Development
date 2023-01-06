<?php
session_start();
include "../db.php";

if (isset($_POST['phone']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $phone = validate($_POST['phone']);
    $pass = validate($_POST['password']);
    $id = $_SESSION['user_id'];

    if (empty($phone)) {
        header("Location: ../../authorization.php?error=Phone is required");
        exit();
    } else if (empty($pass)) {
        header("Location: ../../authorization.php?error=Password is required");
        exit();
    } else {
        $pass = md5($pass);


        $sql = "SELECT * FROM users WHERE phone='$phone' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['phone'] === $phone && $row['password'] === $pass) {
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['user_id'] = $row['id'];
                header("Location: ../../home.php");
                exit();
            } else {
                header("Location: ../../authorization.php?error=Incorect Phone or password");
                exit();
            }
            
        
            
        } else {
            header("Location: ../../authorization.php?error=Incorect Phone or password");
            exit();
        }
    }
} else {
    header("Location: ../../authorization.php");
    exit();
}
