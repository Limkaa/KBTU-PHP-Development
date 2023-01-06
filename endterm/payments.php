<?php
session_start();
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
    <link rel="stylesheet" href="styles/payments.css">
    <title>Способы оплаты</title>
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
                <a class="nav__link" href="faq.php">
                    <span class="nav__link_title">Вопросы</span>
                </a>
                <a class="nav__link" href="feedback.php">
                    <span class="nav__link_title">Отзывы</span>
                </a>
                <a class="nav__link" href="contacts.php">
                    <span class="nav__link_title">Контакты</span>
                </a>
                <a class="nav__link nav__link--active" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>

        <section class="payments wrapper">
            <h1 class="title">Способы оплаты на Chocotravel</h1>
            <div class="payments__inner">
                <div class="payments__options">
                    <div class="payment_option selected" data-toggle="bank_card">
                        <img class="payment_option__image" src="images/payments/bank_card.png" alt="Payment option image">
                        <div class="payment_option__title">Банковской картой</div>
                    </div>
                    <div class="payment_option" data-toggle="rahmet_payment">
                        <img class="payment_option__image" src="images/payments/rahmet-payment-orange.svg" alt="Payment option image">
                        <div class="payment_option__title">Choco</div>
                    </div>
                    <div class="payment_option" data-toggle="freedom_credit">
                        <img class="payment_option__image" src="images/payments/freedom-credit.svg" alt="Payment option image">
                        <div class="payment_option__title">Билеты в рассрочку</div>
                    </div>
                </div>
            </div>
            <div class="info payments__inner">
                <div id="bank_card" style="display: block" >
                    <h3 id="payment_info__title">Вы можете оплатить любой банковской картой выпущенной любым банком.</h3>
                    <p id="payment_info__caption">Важно, чтоб для вашей карты был открыт доступ для оплаты операций в интернете. Если ваш банк поддерживает защитные пароли 3D Secure или Secure Code такой пароль так же должен быть установлен на вашу карту. В случае если оплата не проходит, обратитесь в свой банк. Комиссия за такую транзакцию не взимается.</p>
                </div>
                <div id="rahmet_payment" style="display: none">
                    <h3 id="payment_info__title">Вы можете оплатить через приложение "Choco".</h3>
                    <p id="payment_info__caption">Для оплаты Вам необходимо установить на телефон приложение "Choco". После бронирования билета, Вы должны выбрать "Choco" в способах оплаты на странице оплаты. после вы попадете внутрь приложения, где необходимо подтвердить оплату. Если вы покупаете билеты на сайте, то после нажатия на способ оплаты "Choco" - Вы увидите QR code. Откройте приложение "Choco" на телефон и воспользуйтесь сканером приложения, что бы произвести оплату.</p>
                </div>
                <div id="freedom_credit" style="display: none">
                    <h3 id="payment_info__title">Вы можете оплатить билеты в рассрочку через Freedom Finance Credit.</h3>
                    <p id="payment_info__caption">Для покупки билета в рассрочку Вам необходимо забронировать билет и выбрать способ оплаты в рассрочку. После этого необходимо пройти подтверждение личности и оформить рассрочку. Вам придет смс оповещение с личным кабинетом Freedom Finance, где вы сможете отслеживать и управлять своей рассрочкой.</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="wrapper">
            <div class="footer__row">
                <div class="footer__column">
                    <div class="footer__column_title">О нас</div>
                    <a href="about.php">О компании</a>
                    <a href="articles.php">Блог</a>
                    <a href="payments.php">Способы оплаты</a>
                    <a href="contacts.php">Контакты</a>
                </div>
                <div class="footer__column">
                    <div class="footer__column_title">Пользователям</div>
                    <a href="faq.php">Вопросы - ответы</a>
                    <a href="feedback.php">Отзывы</a>
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

    <script src="js/jquery.js"></script>
    <script src="js/payments_options.js"></script>
</body>

</html>