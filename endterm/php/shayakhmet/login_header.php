<?php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo("<a href='login.html' class='header__login'>Войти</a>");
    } else {
        echo("<div class='post-auth-links'>");
            echo("<a href='cabinet.php' class='profile_link'>Личный кабинет</a>");
            echo("<a href='php/shayakhmet/logout.php' class='header__login'>Выход</a>");
        echo("</div>");
    }
?>