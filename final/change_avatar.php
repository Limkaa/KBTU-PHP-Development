<?php
session_start();
include "php/db.php";
require_once('php/alim/auth_required.php');
header("Content-Type: text/html; charset=UTF-8");
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
        <link rel="stylesheet" type="text/css" href="styles/aizar/header.css echo time(); ?>">
        <link rel="shortcut icon" href="images/website-logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="welcome-user">
            <div>
                <img class="avatar" src="
                <?php
                $sql2 = "SELECT * FROM users AS u JOIN avatars AS a ON a.id = u.avatar_id WHERE phone='" . $_SESSION['phone'] . "'";
                $result2 = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo  $row['path'];
                }
                ?>" alt="avatar">

            </div>
            <h2>Сменить фото профиля</h2>
            <div class="login-form">

                <label>Выберите фото профиля:</label>
                <form class="avatars-check" action="home.php" method="post">

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <label>
                        <input type="radio" name="avatar" value="1">
                        <img id="avatar-id-1" class="avatar" src="images/avatars/1.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="2">
                        <img id="avatar-id-2" class="avatar" src="images/avatars/2.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="3">
                        <img id="avatar-id-3" class="avatar" src="images/avatars/3.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="4">
                        <img id="avatar-id-4" class="avatar" src="images/avatars/4.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="5">
                        <img id="avatar-id-5" class="avatar" src="images/avatars/5.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="6">
                        <img id="avatar-id-6" class="avatar" src="images/avatars/6.png" alt="avatar">
                    </label>

                    <label>
                        <input type="radio" name="avatar" value="7">
                        <img id="avatar-id-7" class="avatar" src="images/avatars/7.png" alt="avatar">
                    </label>


                    <button class="change-avatar" type="submit">Изменить</button>

                </form>
                <a href="home.php" class="ca">Вернуться в личный кабинет</a>
            </div>


    </body>

    </html>

<?php
} else {
    header("Location: authorization.php");
    exit();
}
?>