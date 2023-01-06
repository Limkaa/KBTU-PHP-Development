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
    <link rel="stylesheet" href="styles/visa.css">
    <title>Chocotravel Visa</title>
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
                <a class="nav__link nav__link--active" href="visa.php">
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
                <a class="nav__link" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>

        <section class="visa">
            <h1 class="title">Открывай мир с Chocotravel</h1>
            <div class="subtitle">Онлайн оформление визы в более 40 стран мира</div>

            <div class="countries slider">
                <div class="card">
                    <img class="card__image" src="images/visa/country_1.jpeg" alt="Country">
                    <div class="card__title">Испания</div>
                </div>
                <div class="card">
                    <img class="card__image" src="images/visa/country_2.jpeg" alt="Country">
                    <div class="card__title">Индия</div>
                </div>
                <div class="card">
                    <img class="card__image" src="images/visa/country_3.jpeg" alt="Country">
                    <div class="card__title">Великобритания</div>
                </div>
                <div class="card">
                    <img class="card__image" src="images/visa/country_4.jpeg" alt="Country">
                    <div class="card__title">Австралия</div>
                </div>
            </div>

            <div class="form_container">
                <div class="form__title">Оставьте заявку</div>
                <div class="form__subtitle">Мы свяжемся с вами, чтобы обсудить детали</div>
                <form method="post" action="php/visa/visa_request.php">
                    <div class="form__field">
                        <label for="form_surname" class="form__field__label">Фамилия</label>
                        <input class="form__field__input" type="text" name="surname" id="form_surname" required>
                    </div>
                    <div class="form__field">
                        <label for="form_name" class="form__field__label">Имя</label>
                        <input class="form__field__input" type="text" name="name" id="form_name" required>
                    </div>
                    <div class="form__field">
                        <label for="form_citizenship" class="form__field__label">Гражданство</label>
                        <select class="form__field__input" name="citizenship" id="form_citizenship" required>
                            <option disabled="disabled" value="">Выберите один из вариантов</option>
                            <option value="AU">Австралия</option>
                            <option value="AT">Австрия</option>
                            <option value="AZ">Азербайджан</option>
                            <option value="AL">Албания</option>
                            <option value="DZ">Алжир</option>
                            <option value="AS">Американское Самоа</option>
                            <option value="AO">Ангола</option>
                            <option value="AI">Ангуилла</option>
                            <option value="AD">Андорра</option>
                            <option value="AG">Антигуа и Барбуда</option>
                            <option value="AR">Аргентина</option>
                            <option value="AM">Армения</option>
                            <option value="AW">Аруба</option>
                            <option value="AF">Афганистан</option>
                            <option value="BS">Багамы</option>
                            <option value="BD">Бангладеш</option>
                            <option value="BB">Барбадос</option>
                            <option value="BH">Бахрейн</option>
                            <option value="BY">Беларусь</option>
                            <option value="BZ">Белиз</option>
                            <option value="BE">Бельгия</option>
                            <option value="BJ">Бенин</option>
                            <option value="BM">Бермудские о-ва</option>
                            <option value="BG">Болгария</option>
                            <option value="BO">Боливия</option>
                            <option value="BA">Босния и Герцеговина</option>
                            <option value="BW">Ботсвана</option>
                            <option value="BR">Бразилия</option>
                            <option value="BN">Бруней</option>
                            <option value="BF">Буркина Фасо</option>
                            <option value="BI">Бурунди</option>
                            <option value="BT">Бутан</option>
                            <option value="VU">Вануату</option>
                            <option value="VA">Ватикан</option>
                            <option value="GB">Великобритания</option>
                            <option value="HU">Венгрия</option>
                            <option value="VE">Венесуэла</option>
                            <option value="VI">Вирджинские о-ва</option>
                            <option value="TL">Восточный Тимор</option>
                            <option value="TP">Восточный Тимор</option>
                            <option value="VN">Вьетнам</option>
                            <option value="GA">Габон</option>
                            <option value="HT">Гаити</option>
                            <option value="GY">Гайана</option>
                            <option value="GM">Гамбия</option>
                            <option value="GH">Гана</option>
                            <option value="GT">Гватемала</option>
                            <option value="GN">Гвинея</option>
                            <option value="GW">Гвинея Биссау</option>
                            <option value="DE">Германия</option>
                            <option value="GI">Гибралтар</option>
                            <option value="HN">Гондурас</option>
                            <option value="HK">Гонконг</option>
                            <option value="GD">Гренада</option>
                            <option value="GL">Гренландия</option>
                            <option value="GR">Греция</option>
                            <option value="GE">Грузия</option>
                            <option value="GU">Гуам</option>
                            <option value="DK">Дания</option>
                            <option value="DJ">Джибути</option>
                            <option value="DM">Доминика</option>
                            <option value="DO">Доминиканская республика</option>
                            <option value="EG">Египет</option>
                            <option value="ZM">Замбия</option>
                            <option value="EH">Западная Сахара</option>
                            <option value="ZW">Зимбабве</option>
                            <option value="IL">Израиль</option>
                            <option value="IN">Индия</option>
                            <option value="ID">Индонезия</option>
                            <option value="JO">Иордания</option>
                            <option value="IQ">Ирак</option>
                            <option value="IR">Иран</option>
                            <option value="IE">Ирландия</option>
                            <option value="IS">Исландия</option>
                            <option value="ES">Испания</option>
                            <option value="IT">Италия</option>
                            <option value="CV">Кабо-Верде</option>
                            <option value="KZ" selected>Казахстан</option>
                            <option value="KH">Камбоджа</option>
                            <option value="CM">Камерун</option>
                            <option value="CA">Канада</option>
                            <option value="QA">Катар</option>
                            <option value="KE">Кения</option>
                            <option value="CY">Кипр</option>
                            <option value="KI">Кирибати</option>
                            <option value="CN">Китай</option>
                            <option value="CC">Кокосовые о-ва</option>
                            <option value="CO">Колумбия</option>
                            <option value="KM">Коморские о-ва</option>
                            <option value="CG">Конго</option>
                            <option value="XK">Косово</option>
                            <option value="CR">Коста Рика</option>
                            <option value="CI">Кот-д’Ивуар</option>
                            <option value="CU">Куба</option>
                            <option value="KW">Кувейт</option>
                            <option value="KG">Кыргызстан</option>
                            <option value="LA">Лаос</option>
                            <option value="LV">Латвия</option>
                            <option value="LS">Лессото</option>
                            <option value="LR">Либерия</option>
                            <option value="LB">Ливан</option>
                            <option value="LY">Ливия</option>
                            <option value="LT">Литва</option>
                            <option value="LI">Лихтенштейн</option>
                            <option value="LU">Люксембург</option>
                            <option value="MU">Маврикий</option>
                            <option value="MG">Мадагаскар</option>
                            <option value="MO">Макао</option>
                            <option value="MK">Македония</option>
                            <option value="MW">Малави</option>
                            <option value="MY">Малайзия</option>
                            <option value="ML">Мали</option>
                            <option value="MV">Мальдивские о-ва</option>
                            <option value="MT">Мальта</option>
                            <option value="MA">Марокко</option>
                            <option value="MQ">Мартиника</option>
                            <option value="MH">Маршалловы о-ва</option>
                            <option value="MX">Мексика</option>
                            <option value="FM">Микронезия</option>
                            <option value="MZ">Мозамбик</option>
                            <option value="MD">Молдавия</option>
                            <option value="MC">Монако</option>
                            <option value="MN">Монголия</option>
                            <option value="MS">Монсеррат</option>
                            <option value="MM">Мьянма</option>
                            <option value="NA">Намибия</option>
                            <option value="NR">Науру</option>
                            <option value="NP">Непал</option>
                            <option value="NE">Нигер</option>
                            <option value="NG">Нигерия</option>
                            <option value="AN">Нидерландские Антиллы</option>
                            <option value="NL">Нидерланды</option>
                            <option value="NI">Никарагуа</option>
                            <option value="NU">Ниуэ</option>
                            <option value="NZ">Новая Зеландия</option>
                            <option value="NC">Новая Каледония</option>
                            <option value="NO">Норвегия</option>
                            <option value="NF">Норфолкские о-ва</option>
                            <option value="CK">О-ва Кука</option>
                            <option value="AE">ОАЭ</option>
                            <option value="OM">Оман</option>
                            <option value="PK">Пакистан</option>
                            <option value="PW">Палау</option>
                            <option value="PS">Палестина</option>
                            <option value="PA">Панама</option>
                            <option value="PG">Папуа Новая Гвинея</option>
                            <option value="PY">Парагвай</option>
                            <option value="PE">Перу</option>
                            <option value="PL">Польша</option>
                            <option value="PT">Португалия</option>
                            <option value="PR">Пуэрто Рико</option>
                            <option value="RE">Реюньон</option>
                            <option value="CX">Рождественсткие о-ва</option>
                            <option value="RU">Россия</option>
                            <option value="RW">Руанда</option>
                            <option value="RO">Румыния</option>
                            <option value="US">США</option>
                            <option value="SV">Сальвадор</option>
                            <option value="WS">Самоа</option>
                            <option value="SM">Сан Марино</option>
                            <option value="LC">Санта Лючия</option>
                            <option value="SA">Саудовская Аравия</option>
                            <option value="SZ">Свазиленд</option>
                            <option value="KP">Северная Корея</option>
                            <option value="YE">Северный Йемен</option>
                            <option value="MP">Северо-Марианские о-ва</option>
                            <option value="SC">Сейшельские о-ва</option>
                            <option value="SN">Сенегал</option>
                            <option value="PM">Сент Винцент и Гренадины</option>
                            <option value="ST">Сент Том и Принцип</option>
                            <option value="KN">Сент-Китс и Невис</option>
                            <option value="RS">Сербия</option>
                            <option value="SG">Сингапур</option>
                            <option value="SX">Синт-Мартен</option>
                            <option value="SY">Сирия</option>
                            <option value="SK">Словакия</option>
                            <option value="SI">Словения</option>
                            <option value="SB">Соломоновы о-ва</option>
                            <option value="SO">Сомали</option>
                            <option value="SD">Судан</option>
                            <option value="SR">Суринам</option>
                            <option value="SL">Сьерра Леоне</option>
                            <option value="TJ">Таджикистан</option>
                            <option value="TW">Тайвань</option>
                            <option value="TH">Тайланд</option>
                            <option value="TZ">Танзания</option>
                            <option value="TC">Теркс и Кайкос</option>
                            <option value="TG">Тоголезе</option>
                            <option value="TK">Токелау</option>
                            <option value="TO">Тонго</option>
                            <option value="TT">Тринидад и Тобаго</option>
                            <option value="TV">Тувалу</option>
                            <option value="TN">Тунис</option>
                            <option value="TM">Туркменистан</option>
                            <option value="TR">Турция</option>
                            <option value="UG">Уганда</option>
                            <option value="UZ">Узбекистан</option>
                            <option value="UA">Украина</option>
                            <option value="WF">Уоллис и Футуна</option>
                            <option value="UY">Уругвай</option>
                            <option value="FO">Фарерские о-ва</option>
                            <option value="FJ">Фиджи</option>
                            <option value="PH">Филиппины</option>
                            <option value="FI">Финляндия</option>
                            <option value="FK">Фолклендские о-ва</option>
                            <option value="FR">Франция</option>
                            <option value="GF">Французская Гвиана</option>
                            <option value="PF">Французская полинезия</option>
                            <option value="HR">Хорватия</option>
                            <option value="CF">ЦАР</option>
                            <option value="TD">Чад</option>
                            <option value="ME">Черногория</option>
                            <option value="CZ">Чехия</option>
                            <option value="CL">Чили</option>
                            <option value="CH">Швейцария</option>
                            <option value="SE">Швеция</option>
                            <option value="LK">Шри Ланка</option>
                            <option value="EC">Эквадор</option>
                            <option value="GQ">Экваториальная Гвинея</option>
                            <option value="ER">Эритрия</option>
                            <option value="EE">Эстония</option>
                            <option value="ET">Эфиопия</option>
                            <option value="ZA">ЮАР</option>
                            <option value="KR">Южная Корея</option>
                            <option value="JM">Ямайка</option>
                            <option value="JP">Япония</option>
                        </select>
                        <img class="select_input__arrow" src="images/utils/arrow_down.svg" alt="Arrow down">
                    </div>
                    <div class="form__field">
                        <label for="form_country" class="form__field__label">Страна</label>
                        <select class="form__field__input" name="country" id="form_country" required>
                            <option disabled="disabled" value="" selected>Выберите один из вариантов</option>
                            <option value="AU">Австралия</option>
                            <option value="AT">Австрия</option>
                            <option value="BE">Бельгия</option>
                            <option value="BG">Болгария</option>
                            <option value="BR">Бразилия</option>
                            <option value="GB">Великобритания</option>
                            <option value="HU">Венгрия</option>
                            <option value="VN">Вьетнам</option>
                            <option value="DE">Германия</option>
                            <option value="GR">Греция</option>
                            <option value="DK">Дания</option>
                            <option value="EG">Египет</option>
                            <option value="IL">Израиль</option>
                            <option value="IN">Индия</option>
                            <option value="IR">Иран</option>
                            <option value="IE">Ирландия</option>
                            <option value="IS">Исландия</option>
                            <option value="ES">Испания</option>
                            <option value="IT">Италия</option>
                            <option value="KZ">Казахстан</option>
                            <option value="KH">Камбоджа</option>
                            <option value="CA">Канада</option>
                            <option value="CY">Кипр</option>
                            <option value="CN">Китай</option>
                            <option value="CU">Куба</option>
                            <option value="LV">Латвия</option>
                            <option value="LT">Литва</option>
                            <option value="LU">Люксембург</option>
                            <option value="MK">Македония</option>
                            <option value="MT">Мальта</option>
                            <option value="MA">Марокко</option>
                            <option value="MM">Мьянма</option>
                            <option value="NL">Нидерланды</option>
                            <option value="NZ">Новая Зеландия</option>
                            <option value="NO">Норвегия</option>
                            <option value="AE">ОАЭ</option>
                            <option value="PE">Перу</option>
                            <option value="PL">Польша</option>
                            <option value="PT">Португалия</option>
                            <option value="RU">Россия</option>
                            <option value="RO">Румыния</option>
                            <option value="US">США</option>
                            <option value="SA">Саудовская Аравия</option>
                            <option value="SG">Сингапур</option>
                            <option value="SK">Словакия</option>
                            <option value="SI">Словения</option>
                            <option value="TW">Тайвань</option>
                            <option value="TH">Тайланд</option>
                            <option value="UZ">Узбекистан</option>
                            <option value="FI">Финляндия</option>
                            <option value="FR">Франция</option>
                            <option value="HR">Хорватия</option>
                            <option value="ME">Черногория</option>
                            <option value="CZ">Чехия</option>
                            <option value="CH">Швейцария</option>
                            <option value="SE">Швеция</option>
                            <option value="LK">Шри Ланка</option>
                            <option value="EE">Эстония</option>
                            <option value="ZA">ЮАР</option>
                            <option value="KR">Южная Корея</option>
                            <option value="JP">Япония</option>
                        </select>
                        <img class="select_input__arrow" src="images/utils/arrow_down.svg" alt="Arrow down">
                    </div>

                    <div class="form__field">
                        <label for="form_date" class="form__field__label">Дата поездки</label>
                        <input class="form__field__input" type="date" name="date" id="form_date" required>
                    </div>
                    <div class="form__field">
                        <label for="form_phone" class="form__field__label">Контактный номер</label>
                        <input class="form__field__input" type="tel" name="phone" id="form_phone" required>
                    </div>
                    <div class="form__field">
                        <label for="form_email" class="form__field__label">Электронная почта</label>
                        <input class="form__field__input" type="email" name="email" id="form_email" required>
                    </div>

                    <input class="form__field__input submit" type="submit" value="Отправить заявку">
                </form>
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