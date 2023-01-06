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
    <title>Регистрация</title>
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
        <form action="php/aizar/signup-check.php" method="post">
            <h2>Регистрация</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>ФИО</label>
            <?php if (isset($_GET['fullname'])) { ?>
                <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $_GET['fullname']; ?>"><br>
            <?php } else { ?>
                <input type="text" name="fullname" placeholder="Full Name"><br>
            <?php } ?>

            <label>Телефон (+7**********)</label>
            <?php if (isset($_GET['phone'])) { ?>
                <input type="tel" name="phone" placeholder="Phone" pattern="+7[0-9]{12}" value="<?php echo $_GET['phone']; ?>"><br>
            <?php } else { ?>
                <input type="tel" name="phone" value="+7" pattern="+7[0-9]{12}" required><br>
            <?php } ?>

            <label>Почта</label>
            <input type="email" name="email" placeholder="Email"><br>
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Password"><br>

            <label>Подтверждение пароля</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password"><br>

            <button type="submit">Зарегистрироваться</button>
            <a href="authorization.php" class="ca">Уже есть аккаунт?</a>
        </form>
    </div>
</body>

</html>