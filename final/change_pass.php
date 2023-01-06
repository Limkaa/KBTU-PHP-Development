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
        <title>Изменение пароля</title>
        <link rel="stylesheet" type="text/css" href="styles/aizar/authorization.css?<? echo time(); ?>">
        <link rel="stylesheet" type="text/css" href="styles/aizar/header.css?<? echo time(); ?>">
        <link rel="shortcut icon" href="images/website-logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="top-header">
                <a href="index.php" class="logo-link"><img class="logo" src="images/logo.png" alt="logo"></a>

                <button class="top-buttons">Банк</button>
                <button class="top-buttons">Бизнес</button>
                <button class="top-buttons">Private</button>

                <form class="top-search">
                    <input type="text" placeholder="Поиск в Jusan">
                </form>
                <span class="language">RU</span>

            </div>
            <div class="bottom-header">
                <a class="header-links"><img src="images/shop-tiny.webp" alt="shop">Магазин <span class="shop24">0-0-24</span></a>
                <a class="header-links"><img src="images/invest-tiny.webp" alt="invest">Мой Банк</a>
                <a class="header-links"><img src="images/inshurance-tiny.webp" alt="insurance">Платежи</a>
                <p class="header-links"><img src="images/travel-tiny.webp" alt="travel">Путешествия<span class="travel5">5%</span></p>
                <p class="header-links"><img src="images/mobile-tiny.webp" alt="mobile">Mobile</p>
                <p class="header-links"><img src="images/ticket.webp" alt="tickets">Билеты</p>
                <p class="header-links"><img src="images/currency-tiny.webp" alt="currency">Валюты</p>
            </div>
        </header>
        <div class="welcome-user">
            <h1>Здравствуйте, <?php echo $_SESSION['fullname']; ?> !</h1>
            <h2>Хотите сменить пароль?</h2>
            <form class="change-form" action="php/aizar/change.php" method="post">
                <h2>Изменение пароля</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <label>Старый пароль</label>
                <input type="password" name="old" placeholder="Старый пароль">
                <br>

                <label>Новый пароль</label>
                <input type="password" name="new" placeholder="Новый пароль">
                <br>

                <label>Подтвердите новый пароль</label>
                <input type="password" name="c_pass" placeholder="Подтвердите новый пароль">
                <br>

                <button type="submit">Изменить</button>
                <a href="home.php" class="ca">Вернуться в личный кабинет</a>
            </form>
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