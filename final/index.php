<?php
session_start();
include "php/db.php";
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/title-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/aizar/styles.css?<? echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="styles/aizar/header.css?<? echo time(); ?>">
    <title>Jusan.kz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- <header>
        <div class="top-header">
            <a href="index.php" class="logo-link"><img class="logo" src="images/logo.png" alt="logo"></a>

            <button class="top-buttons" id="top-buttons-bank">Банк
                <div class="menu-category-content">
                    <div class="expanded-content">
                        <div class="ul-container"><span class="ul-container-title">Банк</span>
                            <ul>
                                <li class=""><a href="">О Банке</a></li>
                                <li class=""><a href="">Руководство</a></li>
                                <li class=""><a href="">Новости</a></li>
                                <li class=""><a href="">Банки корреспонденты</a></li>
                                <li class=""><a href="">ESG</a></li>
                            </ul>
                        </div>
                        <div class="ul-container"><span class="ul-container-title">Продукты</span>
                            <ul>
                                <li class=""><a href="">Кредиты</a></li>
                                <li class=""><a href="">Депозиты</a></li>
                                <li class=""><a href="">Дебетовые карты</a></li>
                                <li class=""><a href="">Банковские услуги</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </button>

            <button class="top-buttons" id="top-buttons-business">Бизнес
                <div class="menu-category-content-2">
                    <div class="expanded-content">
                        <div class="ul-container"><span class="ul-container-title">Для бизнеса</span>
                            <ul>
                                <li class=""><a href="">Jusan Tole</a></li>
                                <li class=""><a href="">Кредиты</a></li>
                                <li class=""><a href="">Депозиты</a></li>
                                <li class=""><a href="">Инвестиции</a></li>
                            </ul>
                        </div>
                        <div class="ul-container"><span class="ul-container-title"> </span>
                            <ul>
                                <li class=""></li>
                                <li class=""><a href="">Тарифы</a></li>
                                <li class=""><a href="">Страхование</a></li>
                                <li class=""><a href="">Банкинг</a></li>
                                <li class=""><a href="">Другие продукты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </button>

            <button class="top-buttons">Private</button>

            <form class="top-search">
                <input type="text" placeholder="Поиск в Jusan">
            </form>
            <span class="language">RU</span>
            <a href="home.php" style="color: lightgray; margin-left: 20px; margin-top: 10px;">Мой кабинет</a>
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
    </header> -->
    <?php include("php/aizar/jusan_header.php") ?>
    <section class="content">
        <div>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <img src="images/slider-icon1.webp" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="images/slider-icon2.webp" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="images/slider-icon3.webp" style="width:100%">
                </div>
                <div class="dots" style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
                <a class="prev" onclick="plusSlides(-1)"><img src="images/arrow-left.png"></a>
                <a class="next" onclick="plusSlides(1)"><img src="images/arrow-right.png"></a>

            </div>

            <nav class="popular-navigation">
                <a class="nav-links" href=""><span class="icon"><img src="images/nav-second-stock.webp" alt="stocks"></span>Акции</a>
                <a class="nav-links" href=""><span class="icon"><img src="images/nav-second-express-loan.webp" alt="credits"></span>Кредиты</a>
                <a class="nav-links" href=""><span class="icon"><img src="images/pay-cart-icon.webp" alt="cards"></span>Дебетовые
                    карты</a>
                <a class="nav-links" href=""><span class="icon"><img src="images/auto-inshurance-icon.webp" alt="autoinsurance"></span>Автострахование</a>
                <a class="nav-links" href=""><span class="icon"><img src="images/nav-second-jusan-deposit.webp" alt="deposits"></span>Депозиты</a>
            </nav>
        </div>
        <h2 class="block-title">Продукты банка</h2>
        <div class="bank-products">
            <div class="products-item">
                <h3 class="title">Экспресс-кредит</h3>
                <div class="subtitle">Онлайн без залога и на любые цели</div>
                <div class="products-icons"><img id="credit-img" src="images/home-bank-products/products-credit.png">
                </div>
                <button class="products-more" id="more-1">Узнать подробнее<i class="arrow right"></i></button>
            </div>
            <div class="products-item">
                <h3 class="title">Jusan депозит</h3>
                <div class="subtitle">Управляйте своими сбережениями онлайн</div>
                <div class="products-icons"><img id="deposit-img" src="images/home-bank-products/products-deposit.png">
                </div>
                <button class="products-more">Узнать подробнее<i class="arrow right"></i></button>
            </div>
            <div class="products-item">
                <h3 class="title">Карта Jusan</h3>
                <div class="subtitle">Чем больше транзакций, тем больше бонусов</div>
                <div class="products-icons"><img id="card-img" src="images/home-bank-products/products-card.png"></div>
                <button class="products-more">Узнать подробнее<i class="arrow right"></i></button>
            </div>
            <div class="products-item" id="item-4">
                <h3 class="title">Рефинансирование займов</h3>
                <div class="subtitle"> Выгодные условия для комфортного погашения</div>
                <div class="products-icons"><img src="images/home-bank-products/products-loan.png"></div>
                <button class="products-more">Узнать подробнее<i class="arrow right"></i></button>
            </div>
            <div class="products-item" id="item-5">
                <h3 class="title">Кредит до зарплаты*</h3>
                <div class="subtitle">Выдаем нужную сумму до зарплаты. Без залога, на любые цели.</div>
                <div class="products-icons"><img src="images/home-bank-products/products-zpcredit.png"></div>
                <button class="products-more">Узнать подробнее<i class="arrow right"></i></button>
            </div>
        </div>
        <h2 class="block-title">Магазин</h2>
        <div class="shop">
            <div class="shop-item">
                <h3 class="shop-title">Спорт и туризм</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/sportandtourism.webp">
                </div>
            </div>
            <div class="shop-item">
                <h3 class="shop-title">Ноутбуки и Компьютеры</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/notebook.webp">
                </div>
            </div>
            <div class="shop-item">
                <h3 class="shop-title">Смартфоны и гаджеты</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/smartphone.webp"></div>
            </div>
            <div class="shop-item">
                <h3 class="shop-title">Мебель для дома</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/furniture.webp">
                </div>
            </div>
            <div class="shop-item">
                <h3 class="shop-title">Бытовая техника</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/appliances.webp">
                </div>

            </div>
            <div class="shop-item">
                <h3 class="shop-title">ТВ, аудио, видео и фото</h3>
                <div class="shop-icons"><img id="" src="images/home-shop/educational.webp"></div>
            </div>
        </div>
        <h2 class="block-title">Сервисы</h2>
        <div class="services">
            <div class="service-item" id="service-item-1">
                <h3 class="service-title">Банк для малого и среднего бизнеса</h3>
                <div class="service-subtitle">У нас всё онлайн — на сайте и в приложении. Откройте счет не выходя из
                    дома и ведите бизнес с комфортом
                    <button class="service-more" id="service-more-1">Перейти</button>
                </div>

                <div class="service-icons"><img id="bank-img" src="images/home-services/business.webp">
                </div>

            </div>
            <div class="service-item" id="service-item-2">
                <h3 class="service-title">Инвестиции</h3>
                <div class="service-subtitle">Инвестируйте или доверьте экспертам управлять вашими инвестициями
                    <button class="service-more" id="service-more-2">Перейти</button>
                </div>

                <div class="service-icons"><img id="invest-img" src="images/home-services/invest.webp">
                </div>

            </div>
            <div class="service-item" id="service-item-3">
                <h3 class="service-title">Страхование</h3>
                <div class="service-subtitle">Мы оберегаем все, что Вы цените
                    <button class="service-more" id="service-more-3">Перейти</button>
                </div>

                <div class="service-icons"><img id="insurance-img" src="images/home-services/insurance.webp">
                </div>

            </div>
        </div>
    </section>
    <div class="footer">
        <div class="">
            <div id="download-app" class="banner-section">
                <div class="qr-code"><img src="images/qr.webp" alt="QRCODE">
                </div>
                <div class="offer-block" style="background: url(images/mobile.png) no-repeat;
                background-position-x: 100%;">
                    <h3>Приложение Jusan</h3>
                    <p>Одно приложение – много возможностей!</p>
                    <p>В приложении Jusan вы найдете все, что вам нужно</p>
                    <div class="apps"><button class="download-app">Скачать
                            приложение</button></div>
                </div>
            </div>
            <ul class="bottom-navigation">
                <li><a href="">О Банке</a></li>
                <li><a href="">Новости</a></li>
                <li><a href="https://www.jusananalytics.kz/">Jusan Analytics</a></li>
                <li><a href="">Private Banking</a></li>
                <li><a href="">Документы</a></li>
                <li><a href="">Курсы валют</a></li>
                <li><a href="">Отделения</a></li>
                <li><a href="">Банки-корреспонденты</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Комплаенс</a></li>
            </ul>
            <div class="expanded-footer">
                <div class="ul-container"><span class="ul-container-title">Банк</span>
                    <ul>
                        <li class=""><a href="">Экспресс-кредит</a></li>
                        <li class=""><a href="">Рефинансирование</a></li>
                        <li class=""><a href="">Jusan депозит</a></li>
                        <li class=""><a href="">Карта Jusan</a></li>
                        <li class=""><a href="">Прочие продукты</a></li>
                    </ul>
                </div>
                <div class="ul-container"><span class="ul-container-title">Для бизнеса</span>
                    <ul>
                        <li class=""><a href="https://business.jusan.kz/ru/tole">Jusan Tole и эквайринг</a></li>
                        <li class=""><a href="https://business.jusan.kz/ru/credits">Кредит для бизнеса</a></li>
                        <li class=""><a href="https://business.jusan.kz/ru/open">Открыть счет</a></li>
                        <li class=""><a href="https://business.jusan.kz/ru/others">Прочие услуги</a></li>
                    </ul>
                </div>
                <div class="ul-container"><span class="ul-container-title">Магазин</span>
                    <ul>
                        <li class=""><a href="">Товары</a>
                        </li>
                        <li class=""><a href="">Услуги</a>
                        </li>
                        <li class=""><a href="">Продукты</a>
                        </li>
                        <li class=""><a href="">Акции</a>
                        </li>
                        <li class=""><a href="">Стать
                                партнером</a></li>
                    </ul>
                </div>
                <div class="ul-container"><span class="ul-container-title">Страхование</span>
                    <ul>
                        <li class=""><a href="https://c.jgarant.kz/OgpoVts/default">ОГПО ВТС автострахование</a></li>
                        <li class=""><a href="https://jgarant.kz/ru/catalog/kasko-avtostrahovanie_6/">КАСКО
                                автострахование</a></li>
                        <li class=""><a href="https://jgarant.kz/ru/catalog/strahovanie-imuschestva_10/">Страхование
                                имущества</a></li>
                        <li class=""><a href="https://jgarant.kz/ru/catalog/dsgpo-vladelcev-transportnyh-sredstv_16/">ДГПО
                                авто</a></li>
                        <li class=""><a href="https://jgarant.kz/ru/catalog/obyazatelnoe-strahovanie_19/">Ответственность
                                перевозчика перед пассажиром</a></li>
                        <li class=""><a href="https://jgarant.kz/ru/catalog/strahovanie-gruzov_15/">Страхование
                                грузов</a></li>
                        <li class=""><a href="https://jgarant.kz/">Прочие услуги</a></li>
                    </ul>
                </div>
                <div class="ul-container"><span class="ul-container-title">Инвестиции</span>
                    <ul>
                        <li class=""><a href="https://www.jusaninvest.kz/ipo.html">IPO нацкомпаний</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/trading">Онлайн торговля</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/ipif">Инвестиционные фонды (ПИФ)</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/academy">Академия инвестирования</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/pension">Пенсионные активы</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/radar">Соцсеть инвесторов</a></li>
                        <li class=""><a href="https://www.jusaninvest.kz/">Прочие продукты</a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom-section">
                <ul class="contacts">
                    <li><a href="tel:+7 (717) 258-77-11"><span class="icon"><img src="https://jusan.kz/file-server/filename?dir=icons&amp;filename=phone-icon.webp" alt="phone"></span>+7 (717) 258-77-11</a></li>
                    <li><a href="tel:7711"><span class="icon"><img src="https://jusan.kz/file-server/filename?dir=icons&amp;filename=phone-icon.webp" alt="phone"></span>7711</a></li>
                    <li><a href="mailto: info@jusan.kz"><span class="icon"><img src="https://jusan.kz/file-server/filename?dir=icons&amp;filename=mail-icon.webp" alt="mail"></span> info@jusan.kz</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script defer src="js/aizar/slider.js"></script>
</body>

</html>