<?php
session_start();
include "php/db.php";
header("Content-Type: text/html; charset=UTF-8");
require_once('php/alim/auth_required.php');
if (isset($_SESSION['user_id']) && isset($_SESSION['phone'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="images/title-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Личный кабинет</title>
        <link rel="stylesheet" type="text/css" href="styles/aizar/authorization.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="styles/aizar/header.css?<? echo time(); ?>">
        <link rel="shortcut icon" href="images/website-logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php include("php/aizar/jusan_header.php") ?>
        <div class="welcome-user">
            <div>
                <?php

                ?>
                <img class="avatar" src="
                <?php
                function validate($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $phone = $_SESSION['phone'];
                $avatar_id = $_POST["avatar"];

                $sql2 = "SELECT * FROM users AS u JOIN avatars AS a ON a.id = u.avatar_id WHERE phone='" . $_SESSION['phone'] . "'";
                $sql3 = "UPDATE users SET avatar_id = $avatar_id WHERE phone ='" . $_SESSION['phone'] . "'";
                $sql = "SELECT * FROM avatars WHERE id=" . $avatar_id . "";
                if (empty($avatar_id)) {
                    $result2 = mysqli_query($conn, $sql2);
                } else {
                    $result = mysqli_query($conn, $sql3);
                    $result2 = mysqli_query($conn, $sql2);
                }
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo  $row['path'];
                }
                ?>" alt="avatar">

            </div>
            <h1>Здравствуйте, <?php echo $_SESSION['fullname']; ?> !</h1>
            <div class="about-you">
                <h1>Личный кабинет</h1>
                <p>ФИО: <?php echo $_SESSION['fullname'] ?></p>
                <p>Телефон: <?php echo $_SESSION['phone'] ?></p>
                <a href="change_phone.php"><button>Изменить номер телефона</button></a>
                <a href="change_pass.php"><button>Изменить пароль</button></a>
                <a href="change_avatar.php"><button>Изменить фото профиля</button></a>
            </div>
            <div class="logout">
                <a href="php/aizar/logout.php">Выход</a>
            </div>
        </div>


    </body>

    </html>

<?php
} else {
    header("Location: authorization.php");
    exit();
}
?>