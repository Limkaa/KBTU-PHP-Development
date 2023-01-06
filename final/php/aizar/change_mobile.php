<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['phone'])) {


    include "../db.php";
    if (
        isset($_POST['old_phone']) && isset($_POST['new_phone'])
    ) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $old_phone = validate($_POST['old_phone']);
        $new_phone = validate($_POST['new_phone']);

        if (empty($old_phone)) {
            header("Location: ../../change_phone.php?error=Старый номер телефона обязателен");
            exit();
        } else if (empty($new_phone)) {
            header("Location: ../../change_phone.php?error=Новый номер телефона обязателен");
            exit();
        } else {

            $phone = $_SESSION['phone'];

            $sql = "SELECT phone
                FROM users WHERE 
                phone='$phone'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {

                $sql_2 = "UPDATE users
        	          SET phone='$new_phone'
        	          WHERE phone='$phone'";
                mysqli_query($conn, $sql_2);
                header("Location: ../../change_phone.php?success=Your phone has been changed successfully");
                exit();
            } else {
                header("Location: change_phone.php?error=Incorrect phone");
                exit();
            }
        }
    } else {
        header("Location: change_phone.php");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
