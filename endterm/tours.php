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
    <title>Дешевые авиабилеты онлайн: купить авиабилеты в Казахстане. Поиск и бронирование билетов на самолет по доступным ценам</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles/arslan/style.css">
    <link rel="stylesheet" href="styles/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
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
                <a class="nav__link nav__link--active" href="tours.php">
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
                <a class="nav__link" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="wrapper tours">
        <div class="container">
            <section class="tours-request">
                <h1 class="tours-request-header">Chocotravel Tours</h1>
                <h2 class="tours-request-subheader">Оставьте заявку и мы свяжемся с вами</h2>
                <form class="tours-request-form" action="application.php">
                    <input class="form-input tours-request-form-input" type="name" name="name" autocomplete="off" placeholder="Имя" required>
                    <input class="form-input tours-request-form-input" type="tel" name="number" autocomplete="off" placeholder="Номер телефона" required>
                    <button class="form-button tours-request-form-button" type="submit">Оставить заявку</button>
                    <div class="tours-request-form-subtext">
                        <strong>Доступные направления:</strong><span> Турция, Египет, Тайланд, Мальдивы, ГОА, Шри-Ланка</span>
                    </div>
                </form>
                <img class="tours-request-img" src="images/arslan/tours/tourist_1.png" alt="">
            </section>
        </div>
    </div>
    <div class="container-full">
        <section class="offers">
            <h1 class="offers-header">Что мы предлагаем</h1>
            <div class="offers-flex">
                <div class="offer-card">
                    <img width="56px" height="56px" src="images/arslan/tours/plane.svg" alt="plane">
                    <p class="offer-card-text">Только прямые рейсы</p>
                </div>
                <div class="offer-card offer-border-right offer-border-left">
                    <img width="56px" height="56px" src="images/arslan/tours/money.svg" alt="money">
                    <p class="offer-card-text">Гарантия возврата денег до подтверждения тура</p>
                </div>
                <div class="offer-card offer-border-right">
                    <img width="56px" height="56px" src="images/arslan/tours/money_2.svg" alt="money v2">
                    <p class="offer-card-text">Фиксирование цены на 48 часов</p>
                </div>
                <div class="offer-card">
                    <img width="56px" height="56px" src="images/arslan/tours/box.svg" alt="box">
                    <p class="offer-card-text">Перелет, проживание, питание, трансфер, страховка</p>
                </div>
            </div>
        </section>
        <section class="guarantee">
            <div class="guarantee-card">
                <h1 class="guarantee-header">Гарантия самой низкой цены</h1>
                <p class="guarantee-text">Если вы оставите заявку с предложением от конкурента, мы продадим вам выгоднее</p>
            </div>
        </section>
        <section class="recommended-tours">
            <h1 class="recommended-tours-header">Интересные туры</h1>
            <h2 class="recommended-tours-subheader">Исследуйте самые популярные направления в мире и отправляйтесь в путешествие вместе с Chocotravel</h2>
            <div class="tours-overflow">
                <div class="tours-carousel">
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                    <div class="tour-card">
                        <div class="tour-card-main">
                            <img src="https://itapi2.iterios.com/get-preview/aHR0cHM6Ly9zMDEuY2RuLXBlZ2FzdC5uZXQvZ2V0Lzk5Lzk3LzMzLzQ5MzRjNGNhYTJmNTQ0M2FhZDk5NzgyMTAxYTVlNTY5ZTA4MzdmMDJkMWE5YTY5NmFlYzE5YzdlYmUvNTNlYzZjOGEyMDU2Ny5qcGc=?h=400" width="300px" height="182px" alt="" class="tour-card-img">
                            <div class="tour-card-loc">Аджман, ОАЭ</div>
                            <p class="tour-card-name">Ajman Saray A Luxury Collection Resort</p>
                        </div>
                        <div class="tour-card-suppl">
                            <p class="tour-card-cost">от 776 601 тг.</p>
                            <p class="tour-card-text">2 чел / 6-7 ночей, перелет включен</p>
                            <a href="" class="tour-card-button">Оставить заявку</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="application">
            <div class="application-wrapper">
                <h1 class="application-header">Оставьте заявку, мы перезвоним вам</h1>
                <form class="tours-request-form application" action="application.php">
                    <input class="form-input tours-request-form-input" type="name" name="name" autocomplete="off" placeholder="Имя" required>
                    <input class="form-input tours-request-form-input" type="tel" name="number" autocomplete="off" placeholder="Номер телефона" required>
                    <button class="form-button tours-request-form-button" type="submit">Оставить заявку</button>
                    <div class="tours-request-form-subtext">
                        <strong>Доступные направления:</strong><span> Турция, Египет, Тайланд, Мальдивы, ГОА, Шри-Ланка</span>
                    </div>
                </form>
                <img class="application-img" src="images/arslan/tours/tourist_2.png" alt="tourist_2">
                <div class="reserve-hotel">
                    <h3 class="reserve-hotel-header">Забронируйте отель заранее</h3>
                    <a href="https://sp.booking.com/index.html?aid=860418" class="reserve-hotel-button">Перейти на Booking.com</a>
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
</body>

</html>