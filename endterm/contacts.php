<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Контактная информация</title>
    <meta name="description" content="Контактная информация, карта проезда и режим работы офиса Chocotravel.com. Вы можете связаться с нами через форму обратной связи или приехать к нам в офис." />
    <meta name="keywords" content="Контактная информация, Chocotravel, чокотревел" />
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="https://www.chocotravel.com/favicon.png">
    <link rel="stylesheet" href="styles/shayakhmet/chocotravel.css">
    <link rel="stylesheet" href="styles/global.css">
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

    <div class="wrapper" style="min-height: max-content; margin-bottom: 30px;">
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
                <a class="nav__link nav__link--active" href="contacts.php">
                    <span class="nav__link_title">Контакты</span>
                </a>
                <a class="nav__link" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>
        <div class="center">
            <div class="content">
                <div class="content-center">
                    <div class="main_contact_info">
                        <h1 class="heading-action-medium">Контактная информация</h1>
                        <div class="contact_info">
                            <div class="branches" style="padding-top: 20px; display: flex; flex-direction: column;">
                                <div class="branches" style="padding-bottom: 20px;">
                                    <div class="branches-list">
                                        <h2 class="heading-action-small">ТОО "Интернет Туризм"</h1>
                                            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                                <div class="address">
                                                    <b>Мы находимся тут:</b>
                                                    <br>
                                                    <span itemprop="streetAddress">​проспект Гагарина 124​, 1 этаж</span>
                                                    <br>
                                                    <br>
                                                    <b>Время работы:</b>
                                                    <br>
                                                    Без выходных, с 9:00 - 18:00.
                                                    <br>
                                                    <br>
                                                    <div>
                                                        <b>Служба поддержки:</b> Круглосуточно и без выходных
                                                        <br>
                                                        <b>Номера телефонов:</b>
                                                        <p class="m-0">+7 (727) 346 91 19</p>
                                                        <p class="m-0">+7 (747) 346 91 19</p>
                                                    </div>
                                                </div>
                                                <div class="img">
                                                    <img src="images/contacts/map.PNG" style="width: 100%">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="contacts-payment-info">
                                    <p>
                                        <b>Внимание!</b>
                                        Уважаемые пользователи, оплачивайте заказ онлайн, банковскими картами и интернет-банками без комиссии.
                                    </p>
                                </div>
                                <div class="refund_exchange">
                                    <a onclick="toggleVisibility('rfnd')" class="return">Возврат билетов</a>
                                    <a onclick="toggleVisibility('chng')" class="exchange">Обмен билетов</a>
                                </div>
                                <div id="rfnd" class="tab-block" style="display: none">
                                    Процедура возврата следующая:
                                    <br>
                                    <br>
                                    1. Вы заходите в
                                    <a href="cabinet.php">личный кабинет</a>
                                    нашего сайта (он создается автоматически когда вы бронируете билет, указывая ваш адрес электронной почты)
                                    <br>
                                    <br>
                                    2. В разделе
                                    <a href="cabinet.php">"возврата билета"</a>
                                    делаете заявку на возврат билета.
                                    <br>
                                    <br>
                                    3. Наш специалист делает расчет стоимости возврата исходя из вашего билета и правил авиакомпании. После этого вам придет уведомление на электронную почту о том, что произведен расчет.
                                    <br>
                                    <br>
                                    4. Вы принимаете решение или согласиться с суммой возврата или отказаться от возврата и использовать Ваш билет. Для этого необходимо будет нажать на кнопку "согласиться на возврат" или "отменить заявку".
                                    <br>
                                    <br>
                                    5. В случае Вашего согласия, агент оформляет возврат в системе, и отправляет Вам деньги на карточку, а в случае оплаты наличными - оповещает письмом на электронную почту, что вы можете забрать деньги в офисе, в котором Вы оплачивали Ваш билет.
                                    <a href="cabinet.php" class="vzvrt_but">Перейти в раздел возврата билетов</a>
                                </div>
                                <div id="chng" class="tab-block" style="display: none">
                                    Процедура обмена билета следующая:
                                    <br>
                                    <br>
                                    1. Вы заходите в
                                    <a href="cabinet.php">личный кабинет</a>
                                    нашего сайта (он создается автоматически когда вы бронируете билет, указывая ваш адрес электронной почты)
                                    <br>
                                    <br>
                                    2. В разделе
                                    <a href="cabinet.php">"изменение билета"</a>
                                    делаете заявку на изменение билета.
                                    <br>
                                    <br>
                                    3. Наш специалист делает расчет стоимости изменения исходя из вашего билета и правил авиакомпании и наличия мест на изменяемую дату. После этого вам придет уведомление на электронную почту о том, что произведен расчет.
                                    <br>
                                    <br>
                                    4. Вы принимаете решение или согласиться с суммой за изменение или отказаться от изменения билета и воспользоваться текущим билетом. Для этого необходимо будет оплатить стоимость изменения любым удобным способом оплаты или нажать кнопку "отменить заявку".
                                    <br>
                                    <br>
                                    5. После оплаты, агент оформляет изменения в билете, и отправляет Вам новую маршрутную квитанцию на электронную почту.
                                    <a href="cabinet.php" class="vzvrt_but">Перейти в раздел обмен билетов</a>
                                </div>
                                <div class="contact_bottom">
                                    <p>
                                        <span>Внимание!</span>
                                        На большинство вопросов вы найдете ответе в разделе
                                        <a href="faq.php">"Вопросы и ответы"</a>
                                        , а также в
                                        <a href="cabinet.php">Личном кабинете</a>
                                        .
                                    </p>
                                    <p>
                                        Если вы не нашли ответов на интересующий вопрос, пишите на
                                        <a href="mailto:ok@chocotravel.com">ok@chocotravel.com</a>
                                        , или в
                                        <a href="feedback.php">форме обратной связи</a>
                                        .
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script type='text/javascript' src='js/shayakhmet/contacts.js'></script>
</body>

</html>