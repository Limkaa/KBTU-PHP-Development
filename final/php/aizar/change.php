<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['phone'])) {


    include "../db.php";
    if (
        isset($_POST['old']) && isset($_POST['new'])
        && isset($_POST['c_pass'])
    ) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $old = validate($_POST['old']);
        $new = validate($_POST['new']);
        $c_pass = validate($_POST['c_pass']);

        if (empty($old)) {
            header("Location: ../../change_pass.php?error=Old Password is required");
            exit();
        } else if (empty($new)) {
            header("Location: ../../change_pass.php?error=New Password is required");
            exit();
        } else if ($new !== $c_pass) {
            header("Location: ../../change_pass.php?error=The confirmation password  does not match");
            exit();
        } else {

            $old = md5($old);
            $new = md5($new);
            $phone = $_SESSION['phone'];

            $sql = "SELECT password
                FROM users WHERE 
                phone='$phone' AND password='$old'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {

                $sql_2 = "UPDATE users
        	          SET password='$new'
        	          WHERE phone='$phone'";
                mysqli_query($conn, $sql_2);
                header("Location: ../../change_pass.php?success=Your password has been changed successfully");
                exit();
            } else {
                header("Location: ../../change_pass.php?error=Incorrect password");
                exit();
            }
        }
    } else {
        header("Location: ../../change_pass.php");
        exit();
    }
} else {
    header("Location: ../../home.php");
    exit();
}
