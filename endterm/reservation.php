<?php 
    session_start();

    if (!isset($_SESSION['loggedin']) || !isset($_SESSION['id'])) {
        header('Location: login.html');
        die();
    }

    require('db.php');
    require('php/reservation/clear_reservations.php');

    $query = "SELECT * FROM reservation WHERE user_id=1 AND payment_id IS NULL";

    $reservations = mysqli_query($conn,  $query);
    if ($reservations->num_rows > 0) {
        header("Location: payment.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/booking.css">
    <link rel="stylesheet" href="styles/global.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование билета</title>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col" style="height: 100vh;">
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

    <div class="wrapper flex-grow" style="min-height: max-content;">
        <nav class="nav">
            <div class="nav__logo">
                <img src="images/site/chocotravel-logo.svg" alt="Chocotravel logo">
            </div>
            <div class="nav__links">
                <a class="nav__link nav__link--active" href="index.php">
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
                <a class="nav__link" href="payments.php">
                    <span class="nav__link_title">Оплата</span>
                </a>
            </div>
        </nav>

        <section class="booking">
            <?php if (!isset($_SESSION['flights_to'])) { ?>
            <div class="mt-5 full-h flex flex-col w-full items-center">
                <h3 class="text-center mt-0 mb-6 font-semibold w-3/5">Вы еще не выбрали билеты для бронирования</h3>
                <a href="search.php" class="primary_button mb-6">Найти новые билеты</a>
            </div>
            <?php } else { ?>
            <section class="mb-8">
                <form action="php/reservation/create_reservation.php" method="post">
                    <div class="mb-8">
                        <div class="flex flex-col-reverse lg:flex-row items-start lg:items-center lg:justify-between mb-6">
                            <h3 class="mb-0 lg:mt-0 uppercase">Бронирование</h3>
                        </div>
                        <div class="space-y-5">
                            <?php 
                                require('db.php');
                                
                                $flights_to_ids = $_SESSION['flights_to'];

                                $query = "SELECT 
                                    f.*, 
                                    al.id AS airline_id,
                                    al.name AS airline_name,
                                    al.image AS airline_image,
                                    cit_dep.code AS cit_dep_code,
                                    cit_dep.name AS cit_dep_name,
                                    cit_arr.code AS cit_arr_code,
                                    cit_arr.name AS cit_arr_name
                                    FROM `flights` AS f
                                    LEFT JOIN airlines AS al 
                                    ON f.airline_id = al.id
                                    LEFT JOIN cities AS cit_dep 
                                    ON f.departure_city_id = cit_dep.id
                                    LEFT JOIN cities AS cit_arr 
                                    ON f.arrival_city_id = cit_arr.id
                                ";
                                $query_flights_to = $query." WHERE f.id IN (" . implode(',', $flights_to_ids) . ")";
                                $ordering = "ORDER BY departure_time ASC";
                                $result = mysqli_query($conn, $query_flights_to." ".$ordering);
                                if ($result->num_rows > 0) {
                                    include('php/reservation/flight_items.php');
                                }
                                
                                if (isset($_SESSION['flights_from']) && count($_SESSION['flights_from']) > 0 ) {
                                    $flights_from_ids = $_SESSION['flights_from'];
                                    $query_flights_from = $query." WHERE f.id IN (" . implode(',', $flights_from_ids) . ")";
                                    
                                    $result = mysqli_query($conn, $query_flights_from." ".$ordering);
                                    if ($result->num_rows > 0) {
                                        include('php/reservation/flight_items.php');
                                    }
                                }
                            ?>
                        </div>
                        <div class="mt-5 text-xs">Время везде указано местное</div>
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-3">
                            <div class="relative bg-white rounded-lg shadow-sm mb-6">
                                <div class="flex justify-between px-5 py-4 border-solid border-0 border-b border-gray-400">
                                    <div class="flex flex-col w-full lg:flex-row lg:items-center lg:w-auto">
                                        <p class="mb-3 lg:m-0">
                                            <b class="text-lg">Пассажир</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="p-5 bg-yellow-200 rounded-lg">
                                    <div>
                                        <div class="inline-flex flex-wrap rounded lg:mt-5 lg:border lg:border-solid lg:border-gray-400">
                                            <div class="labeled-input order-first w-3/5 lg:w-40 lg:order-none outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">ФАМИЛИЯ</span>
                                                        <input required type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="lastName" placeholder="ФАМИЛИЯ" tabindex="10" data-test-id="passengerLastname" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="labeled-input w-1/2 lg:w-40 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">Имя</span>
                                                        <input required type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="firstName" placeholder="Имя" tabindex="10" data-test-id="passengerFirstname" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="labeled-input order-first flex lg:order-none w-2/5 mb-2 lg:w-auto lg:m-0 lg:bg-white">
                                                <div tabindex="0">
                                                    <div tabindex="10" class="flex h-full outline-none">
                                                        <span class="labeled-input__label">
                                                            <p class="m-0 text-center">Пол</p>
                                                        </span>
                                                        <div class="flex flex-1 items-center">
                                                            <p class="mx-1 my-0 lg:hidden">Пол: </p> 
                                                            <label class="gender-radiobtn">
                                                                <input required type="radio" value="Женщина" name="gender" class="gender-radiobtn__input">
                                                                <p class="gender-radiobtn__label">Ж</p>
                                                            </label> 
                                                            <label class="gender-radiobtn">
                                                                <input required type="radio" value="Мужчина" name="gender" class="gender-radiobtn__input"> 
                                                                <p class="gender-radiobtn__label">М</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="labeled-input w-1/2 lg:w-32 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">Дата рождения</span>
                                                        <input id="birthDate" required type="date" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input ml-1 lg:m-0" tabindex="10" name="dateOfBirth" data-test-id="passengerDob" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="labeled-input w-1/2 lg:w-40 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">Номер документа</span>
                                                        <input required name="documentNumber" type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input" placeholder="Номер документа" tabindex="10" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-xs">По указанной дате рождения будет рассчитан возраст пассажира.</div>
                                            <b class="text-xs">Студентам (18-25 лет) и пенсионерам (старше 65 лет) полагается скидка 10% на общую сумму стоимости билетов</b> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-sm mb-6">
                            <div class="p-5">
                                <h3 class="mt-0 mb-3 font-semibold">Как связаться с вами?</h3>
                                <p class="text"> Мы сообщим о ходе обработки заказа, а также, если произойдут какие-либо изменения. </p>
                                <div class="relative inline-flex flex-wrap rounded lg:mt-5 lg:border lg:border-solid lg:border-gray-400 w-2/5">
                                    <div class="labeled-input w-full lg:w-6/12">
                                        <div tabindex="0">
                                            <label class="flex h-10 mb-2 border border-solid border-gray-500 rounded lg:m-0 lg:border-none">
                                                <span class="labeled-input__label">Номер телефона</span>
                                                <input required type="tel" placeholder="+7 (777) 777-77-77" class="appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input w-full pl-1 py-0 border-transparent" name="phone" inputmode="tel" tabindex="10" data-test-id="bookingContactsPhone" style="transition: all 0.3s ease-in 0s;">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="labeled-input w-full lg:w-6/12">
                                        <div tabindex="0">
                                            <label class="flex h-10 mb-2 lg:m-0">
                                                <span class="labeled-input__label">Электронная почта</span>
                                                <input required type="email" class="appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input w-full" name="email" inputmode="email" tabindex="10" placeholder="Введите E-mail" data-test-id="bookingContactsEmail" style="transition: all 0.3s ease-in 0s;">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow-sm mb-6">
                            <div class="p-5">
                                <h3 class="mt-0 mb-3 font-semibold">Условия, правила и ограничения</h3>
                                <p class="text">
                                    Пожалуйста, прочитайте <a href="/ru/agreement" target="_blank">соглашение</a> с Chocotravel.com и
                                    <button class="p-0 bg-transparent border-none outline-none text-black text-sm underline cursor-pointer"> условия возврата/обмена билетов </button>.
                                    Билеты не передаваемые, изменение имени и фамилии пассажира после выписки запрещено. Стоимость включает тариф, сборы и таксы, включая стоимость перевозки багажа норма багажа). Стоимость не включает возможные сборы, взимаемые авиакомпанией напрямую (доп. багаж и другое). Вы даете согласие, что ввели корректные паспортные и контактные данные. Продублированные бронирования (на одного того же пассажира и рейс) автоматически аннулируются авиакомпанией, вне зависимости от того оплачены они или нет.
                                </p>
                                <div class="inline-block">
                                    <div hide-on-click="false" placement="top" trigger="mouseenter focus manual" arrow="">
                                        <div tabindex="0">
                                            <label tabindex="0" class="flex items-center outline-none">
                                                <input required name="acceptedTerms" type="checkbox" data-test-id="agreementCheckbox" value="false" class="mr-2">
                                                Принимаю условия, правила и ограничения
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0">После оплаты электронный билет придет на Вашу электронную почту.</p>
                            </div>
                            <div class="border-solid border-0 border-t border-gray-400 p-5">
                                <div class="mb-3 flex justify-between">
                                    <div class="mb-3 text-xs">Также при переходе на страницу оплаты, будут учтены бонусы для постоянных клиентов и политика цен (ночью после 22:00 стоимость билетов на 3% ниже)</div> 
                                    <div class="font-semibold text-xs ml-4">После бронирования билетов вас перенаправит на страницу оплаты. Билеты закрепляются за вами на 5 минут, после чего, в случае неоплаты, бронирование будет снято.</div> 
                                </div>
                                <div class="flex flex-col justify-between lg:flex-row">
                                    <div class="flex flex-grow flex-wrap lg:mr-5">
                                        <div class="flex flex-col justify-between lg:w-2/3" data-test-id="offerPrice">
                                            <p class="m-0 text-xs">
                                                <span>Стоимость билетов:</span>
                                            </p>
                                            <p class="m-0 text-2xl font-semibold">
                                                <span id="total-price">0</span>
                                                <span class="text text-gray-500">KZT</span>
                                            </p>
                                            <p class="m-0">
                                                <span class="text text-gray-500">На странице оплаты будут учтены все скидки</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-end mt-4 lg:mt-0">
                                        <input type="submit" class="btn-action-large w-full py-3 lg:w-56" value="Забронировать" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <?php } ?>
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
    <script src="js/reservation.js"></script>
</body>

</html>