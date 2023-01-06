<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/title-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="styles/aizar/authorization.css?<? echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="styles/aizar/header.css?<? echo time(); ?>">
    <link rel="shortcut icon" href="images/website-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>

<body>
    <a href="index.php"><img class="login-logo" src="images/logo.png" alt="logo"></a>
    <div class="login-form">

        <form action="php/aizar/login.php" method="post">
            <h2>Вход</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Телефон (+7**********)</label>
            <input type="tel" name="phone" value="+7" pattern="+7[0-9]{12}" required><br>

            <label>Пароль</label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Войти</button>
            <a href="signup.php" class="ca">Создать аккаунт</a>
        </form>
    </div>

</body>

</html>