<?php
session_start();

function createAccordion($question, $answer, $tag_name) {
    echo "<div class='accordion $tag_name'>
        <div class='accordion__header'>
            <div class='accordion__header_title'>$question</div>
            <img class='accordion__header_btn' src='images/utils/accordion_arrow.svg' alt='Arrow image'>
        </div>
        <div class='accordion__body'>$answer</div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="сми, Chocotravel, чокотревел" />
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="https://www.chocotravel.com/favicon.png">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/faq.css">
    <title>Вопросы - ответы</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__companies">
                <a class="company" target="_blank" rel="nofollow" href="https://chocolife.me/?utm_source=chocotravel.com&utm_medium=plashka">
                    <div class="company_container">
                        <div class="company__title">Скидки до 90%</div>
                        <img class="company__image" src="images/site/chocolife.svg" alt="Chocolife logo">
                    </div>
                </a>
                <div class="company header__company--active" rel="nofollow" href="">
                    <div class="company_container">
                        <div class="company__title">Авиабилеты</div>
                        <img class="company__image" src="images/site/chocotravel-small.svg" alt="Chocotavel logo" style="opacity: 1; filter: none">
                    </div>
                </div>
                <a class="company" target="_blank" rel="nofollow" href="http://lensmark.kz/?utm_source=chocotravel.com&utm_medium=plashka">
                    <div class="company_container">
                        <div class="company__title">Оптика</div>
                        <img class="company__image" src="images/site/lensmark.svg" alt="Lensmark logo">
                    </div>
                </a>
                <a class="company" target="_blank" rel="nofollow" href="http://chocofood.kz/?utm_source=chocotravel.com&utm_medium=plashka">
                    <div class="company_container">
                        <div class="company__title">Заказ еды</div>
                        <img class="company__image" src="images/site/chocofood.svg" alt="Chocofood logo">
                    </div>
                </a>
                <a class="company" target="_blank" rel="nofollow" href="http://idoctor.kz/?utm_source=chocotravel&utm_medium=plashka">
                    <div class="company_container">
                        <div class="company__title">Поиск врачей</div>
                        <img class="company__image" src="images/site/idoctor.svg" alt="Idoctor logo">
                    </div>
                </a>
            </div>
            <?php include('php/shayakhmet/login_header.php');?>
        </div>
    </header>

    <div class="wrapper">
        <nav class="nav">
            <div class="nav__logo">
                <img src="images/site/chocotravel-logo.svg" alt="Chocotravel logo">
            </div>
            <div class="nav__links">
                <a class="nav__link" href="index.php">
                    <img class="nav__link_image" src="images/site/icons/plane.svg" alt="Plane">
                    <span class="nav__link_title">Авиабилеты</span>
                </a>
                <a class="nav__link" href="visa.php">
                    <img class="nav__link_image" src="images/site/icons/visa.svg" alt="Visa">
                    <span class="nav__link_title">Визы</span>
                </a>
                <a class="nav__link" href="tours.php">
                    <img class="nav__link_image" src="images/site/icons/tours.svg" alt="Tours">
                    <span class="nav__link_title">Туры</span>
                </a>
                <a class="nav__link" href="about.php">
                    <span class="nav__link_title">О компании</span>
                </a>
                <a class="nav__link" href="articles.php">
                    <span class="nav__link_title">Блог</span>
                </a>
                <a class="nav__link nav__link--active" href="faq.php">
                    <span class="nav__link_title">Вопросы</span>
                </a>
                <a class="nav__link" href="feedback.php">
                    <span class="nav__link_title">Отзывы</span>
                </a>
                <a class="nav__link" href="contacts.php">
                    <span class="nav__link_title">Контакты</span>
                </a>
                <a class="nav__link" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>
        <section class="faq">
            <div class="title">Часто задаваемые вопросы</div>

            <form class="faq__search_form" action="" method="post">
                <input type="text" name="text" id="form_text" placeholder="Поиск">
                <div class="submit_input">
                    <img class="submit_input__image" src="images/utils/magnifier.svg" alt="Magnifier">
                    <input class="submit_input__btn" type="submit" value="Найти">
                </div>
            </form>

            <div class="faq__content">
                <div class="tags">
                    <div class="tag tag--active">
                        <img class="tag__image" src="images/faq/all.svg" alt="Tag image">
                        <span class="tag__title">Все</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/popular.svg" alt="Tag image">
                        <span class="tag__title">Популярное</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/plane.svg" alt="Tag image">
                        <span class="tag__title">Авиабилеты</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/payment.svg" alt="Tag image">
                        <span class="tag__title">Оплата</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/documents.svg" alt="Tag image">
                        <span class="tag__title">Документы</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/visa.svg" alt="Tag image">
                        <span class="tag__title">Виза</span>
                    </div>
                    <div class="tag">
                        <img class="tag__image" src="images/faq/baggage.svg" alt="Tag image">
                        <span class="tag__title">Багаж</span>
                    </div>
                </div>

                <div class="questions">
                    <?php 
                        require_once "db.php";

                        $sql = "SELECT * FROM faq LEFT JOIN tags ON faq.tag_id = tags.id";
                        $result = $conn->query($sql);
                        foreach($result as $key => $row) {
                            createAccordion($row['question'], $row['answer'], $row['name']);
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="wrapper">
            <div class="footer__row">
                <div class="footer__column">
                    <div class="footer__column_title">О нас</div>
                    <a href="about.html">О компании</a>
                    <a href="articles.html">Блог</a>
                    <a href="payments.html">Способы оплаты</a>
                    <a href="contacts.html">Контакты</a>
                </div>
                <div class="footer__column">
                    <div class="footer__column_title">Пользователям</div>
                    <a href="faq.html">Вопросы - ответы</a>
                    <a href="feedback.html">Отзывы</a>
                </div>
            </div>
            <div class="footer__row">
                <div class="footer__column footer__icons">
                    <img src="images/site/icons/visa-pay-logo.svg" alt="Visa pay">
                    <img src="images/site/icons/master-card.svg" alt="Mastercard">
                    <img src="images/site/icons/union-pay.svg" alt="Union pay">
                </div>
                <div class="footer__column footer__icons">
                    <img src="images/site/icons/astana-hub.png" alt="Visa pay" style="height: 26px;">
                </div>
            </div>
        </div>
    </footer>

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/shayakhmet/faq.js'></script>
</body>

</html>