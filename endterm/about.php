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
    <link rel="stylesheet" href="styles/about.css">
    <title>О компании</title>
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
                <a class="nav__link nav__link--active" href="about.php">
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

        <section class="about">
            <h1 class="title">О проекте Chocotravel.com</h1>
            <div class="inner">
                <div class="info">
                    <p>Chocotravel.com — туристический портал, основанный в 2013 году. На данный момент, является одним из лидеров online рынка авиабилетов в Республике Казахстан. Наш сайт позволяет быстро и просто находить дешевые авиабилеты и отели без дополнительных сборов. Наша уникальная система рекомендаций позволяет путешественникам найти минимальные тарифы, обнаруженные за последние три дня, в любую точку мира.</p>
                    <p>Компания входит в холдинг Chocofamily, который состоит из 7 интернет-проектов, все из которых являются лидерами в своих сферах.</p>
                    <div class="stats">
                        <div class="stats__indicator">
                            <div class="stats__indicator_value">450 000+ человек</div>
                            <p class="stats__indicator_caption">Ежемесячно находят авиабилеты на нашем сайте.</p>
                        </div>
                        <div class="stats__indicator">
                            <div class="stats__indicator_value">1000+ авиакомпаний</div>
                            <p class="stats__indicator_caption">Предоставляют нам информацию о своих рейсах, стоимости и спецпредложениях.</p>
                        </div>
                    </div>
                </div>
                <div class="benefits">
                    <h2 class="block__title">Наши преимущества</h2>
                    <div class="benefits__items">
                        <div class="benefits__item">
                            <img class="benefits__item_image" src="images/about/benefits/benefits_1.png" alt="Benefit image">
                            <div class="benefits__item_caption">Комиссия<br>0 тенге</div>
                        </div>
                        <div class="benefits__item">
                            <img class="benefits__item_image" src="images/about/benefits/benefits_2.png" alt="Benefit image">
                            <div class="benefits__item_caption">Покупка за<br>3 минуты</div>
                        </div>
                        <div class="benefits__item">
                            <img class="benefits__item_image" src="images/about/benefits/benefits_3.png" alt="Benefit image">
                            <div class="benefits__item_caption">1000+<br>авиакомпаний</div>
                        </div>
                        <div class="benefits__item">
                            <img class="benefits__item_image" src="images/about/benefits/benefits_4.png" alt="Benefit image">
                            <div class="benefits__item_caption">Регулярные<br>подарки</div>
                        </div>
                    </div>
                </div>
                <div class="awards">
                    <h2 class="block__title">Награды и сертификаты</h2>
                    <div class="awards__items">
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_1.png" alt="Award image">
                            <div class="awards__item_caption">«Лучший онлайн ритейлер» 2014 Международной Выставки-Конференции Astex</div>
                        </div>
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_2.png" alt="Award image">
                            <div class="awards__item_caption">«Компания года 2014» национальной премии AWARD.kz</div>
                        </div>
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_3.png" alt="Award image">
                            <div class="awards__item_caption">Финалист премии «Ак Мерген» как лучший онлайн PR-проект</div>
                        </div>
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_4.png" alt="Award image">
                            <div class="awards__item_caption">Сертифицированный партнер Amadeus</div>
                        </div>
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_5.png" alt="Award image">
                            <div class="awards__item_caption">Участник рейтинга ТОП-50 крупнейших интернет компаний Казахстана</div>
                        </div>
                        <div class="awards__item">
                            <img class="awards__item_image" src="images/about/awards/award_6.png" alt="Award image">
                            <div class="awards__item_caption">Члены Международной Ассоциации Туризма Профессионалов (ITAP)</div>
                        </div>
                    </div>
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