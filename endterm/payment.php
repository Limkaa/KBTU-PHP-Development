<?php 
    session_start();

    if (!isset($_SESSION['loggedin']) || !isset($_SESSION['id'])) {
        header('Location: login.html');
        die();
    }
    
    require('db.php');
    require('php/reservation/clear_reservations.php');

    $user_id = $_SESSION['id'];

    $query = "SELECT * FROM reservation WHERE user_id=$user_id AND payment_id IS NULL";

    $reservations = mysqli_query($conn,  $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/booking.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование билета</title>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col" style="height: 100vh">
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

    <div class="wrapper flex-grow">
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

        
        <section class="booking flex-grow">
            <?php if ($reservations->num_rows == 0) {?>
            
            <div class="mt-5 full-h flex flex-col w-full items-center">
                <h3 class="text-center mt-0 mb-6 font-semibold w-3/5">Время выкупа ранее забронированных билетов истекло, либо вы не бронировали билеты</h3>
                <a href="search.php" class="primary_button mb-3">Найти новые билеты</a>
                <a href="reservation.php" class="primary_button mb-3">Забронировать билеты последнего поиского запроса</a>
                <a href="cabinet.php" class="primary_button mb-6">Перейти в личный кабинет</a>
            </div>
    
            <?php } else { ?>
            <section class="mb-8">
                <div class="mb-8">
                    <div class="flex flex-col-reverse lg:flex-row items-start lg:items-center lg:justify-between mb-6">
                        <h3 class="mb-0 lg:mt-0 uppercase">Оплатите забронированные билеты</h3>
                        <button class="p-0 outline-none border-0 border-b border-dashed bg-transparent cursor-pointer"> Вернуться к результатам </button>
                    </div>
                    <?php include('php/reservation/reserved_items.php') ?>
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
                                                    <span class="labeled-input__label">Фамилия</span>
                                                    <input required disabled type="text" value="<?php echo $ticket_surname?>" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="lastName" placeholder="ФАМИЛИЯ" tabindex="10" data-test-id="passengerLastname" style="transition: all 0.3s ease-in 0s;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="labeled-input w-1/2 lg:w-40 outline-none">
                                            <div tabindex="0">
                                                <label class="flex h-10 mb-2 lg:m-0">
                                                    <span class="labeled-input__label">Имя</span>
                                                    <input required disabled type="text" value="<?php echo $ticket_name?>" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="firstName" placeholder="Имя" tabindex="10" data-test-id="passengerFirstname" style="transition: all 0.3s ease-in 0s;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="labeled-input lg:w-32 outline-none">
                                            <div tabindex="0">
                                                <label class="flex h-10 mb-2 lg:m-0">
                                                    <span class="labeled-input__label">Пол</span>
                                                    <input required disabled type="text" value="<?php echo $ticket_gender?>" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="firstName" placeholder="Имя" tabindex="10" data-test-id="passengerFirstname" style="transition: all 0.3s ease-in 0s;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="labeled-input w-1/2 lg:w-32 outline-none">
                                            <div tabindex="0">
                                                <label class="flex h-10 mb-2 lg:m-0">
                                                    <span class="labeled-input__label">Дата рождения</span>
                                                    <input id="birthDate" required disabled type="date" value="<?php echo $ticket_dateOfBirth?>" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input ml-1 lg:m-0" tabindex="10" name="dateOfBirth" data-test-id="passengerDob" style="transition: all 0.3s ease-in 0s;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="labeled-input w-1/2 lg:w-40 outline-none">
                                            <div tabindex="0">
                                                <label class="flex h-10 mb-2 lg:m-0">
                                                    <span class="labeled-input__label">Номер документа</span>
                                                    <input required disabled name="documentNumber" value="<?php echo $ticket_document?>" type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input" placeholder="Номер документа" tabindex="10" style="transition: all 0.3s ease-in 0s;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-xs">По указанной дате рождения рассчитывается возраст пассажира.</div>
                                        <b class="text-xs">Студентам (18-25 лет) и пенсионерам (старше 65 лет) полагается скидка 10% на общую сумму стоимости билетов</b> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm mb-6">
                        <div class="p-5">
                            <h3 class="mt-0 mb-3 font-semibold">Указанные контакты</h3>
                            <p class="text"> Мы сообщим о ходе обработки заказа, а также, если произойдут какие-либо изменения. </p>
                            <div class="relative inline-flex flex-wrap rounded lg:mt-5 lg:border lg:border-solid lg:border-gray-400 w-2/5">
                                <div class="labeled-input w-full lg:w-6/12">
                                    <div tabindex="0">
                                        <label class="flex h-10 mb-2 border border-solid border-gray-500 rounded lg:m-0 lg:border-none">
                                            <span class="labeled-input__label">Номер телефона</span>
                                            <input required disabled type="tel" value="<?php echo $reservation_phone?>" class="appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input w-full pl-1 py-0 border-transparent" name="phone" inputmode="tel" tabindex="10" data-test-id="bookingContactsPhone" style="transition: all 0.3s ease-in 0s;">
                                        </label>
                                    </div>
                                </div>
                                <div class="labeled-input w-full lg:w-6/12">
                                    <div tabindex="0">
                                        <label class="flex h-10 mb-2 lg:m-0">
                                            <span class="labeled-input__label">Электронная почта</span>
                                            <input required disabled type="email" value="<?php echo $reservation_email?>" class="appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input w-full" name="email" inputmode="email" tabindex="10" placeholder="Введите E-mail" data-test-id="bookingContactsEmail" style="transition: all 0.3s ease-in 0s;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-sm mb-6">
                        <div class="p-5">
                            <h3 class="mt-0 mb-3 font-semibold">Оплата забронированных билетов</h3>
                            <div class="text lg:w-2/3">Учтены следующие бонусы (считаются от общей суммы билетов):</div> 
                            <div class="text">

                                <ul style="padding: 10px 0 0 20px;">
                                <?php
                                $today = date("Y-m-d");
                                $age = date_diff(date_create($ticket_dateOfBirth), date_create($today))->format('%y');
                                
                                $age_discount = 0;
                                $night_discount = 0;
                                $personal_discount = 0;

                                if (($age >= 18 && $age <=25) || $age >= 65) { 
                                    $age_discount = floor($total_price * 0.1);
                                }

                                $current_time = date('H');
                                if ($current_time >= 21 || $current_time <= 6) {
                                    $night_discount = floor($total_price * 0.03);
                                }

                                $all_reservation_of_user = "SELECT * FROM reservation WHERE user_id = $user_id AND payment_id IS NOT NULL";
                                $reservations_count = mysqli_query($conn, $all_reservation_of_user);
                                
                                if ($reservations_count->num_rows >= 2) {
                                    $personal_discount = floor($total_price * 0.05);
                                }

                                $total_discount = $age_discount + $night_discount + $personal_discount; 
                                $total_price -= $total_discount;
                                $_SESSION['total_payment_amount'] = $total_price;

                                ?>
                                    <li class="list-disc">Скидка 10% от суммы билетов по программе "молодежный" / "пенсионный" - <?php echo $age_discount?> KZT</li>
                                    <li class="list-disc">Скидка 3% на ночную покупку после 22:00 - <?php echo $night_discount?> KZT</li>
                                    <li class="list-disc">Ваша персональная скидка 5% как постоянному клиенту (2 и более ранее оплаченных бронирований) - <?php echo $personal_discount?> KZT</li>
                                </ul>
                            </div>
                        </div>
                        <div class="border-solid border-0 border-t border-gray-400 p-5">
                            <div class="text lg:w-2/3">Мы принимаем к оплате карты следующих платежных провайдеров:</div> 
                            <div class="text mb-6"> 
                                <ul style="padding: 10px 0 0 20px;">
                                    <li class="list-disc">American Express (начинается с 3)</li>
                                    <li class="list-disc">Visa card (начинается с 4)</li>
                                    <li class="list-disc">Mastercard (начинается с 5)</li>
                                    <li class="list-disc">Discover Card (начинается с 6)</li>
                                </ul>
                            </div>
                            <form onsubmit="return checkCardValidity()" method="post" action="php/payment/process_payment.php">
                                <div class="flex justify-between lg:flex-row">
                                    <div class="flex flex-col">
                                        <div class="inline-flex flex-wrap rounded lg:mt-5 lg:border lg:border-solid lg:border-gray-400 mb-3">          
                                            <div class="labeled-input lg:w-60 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">Номер карты</span>
                                                        <input id="cardNumber" required type="text" maxlength="19" class="lg:w-40 appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input uppercase" name="cardNumber" placeholder="1234 1234 1234 1234" tabindex="10" style="transition: all 0.3s ease-in 0s;">
                                                        <span class="text-xs flex items-center justify-center px-2" id="cardtype-name">Карта не определена</span>
                                                        <input name="cardType" type="text" class="hidden" id="cardType" value="unknown">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="labeled-input w-16 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">Срок</span>
                                                        <input id="cardExpirationDate" maxlength="5" required placeholder="00/00" type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input ml-1 lg:m-0" tabindex="10" name="cardExpirationDate" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="labeled-input w-16 outline-none">
                                                <div tabindex="0">
                                                    <label class="flex h-10 mb-2 lg:m-0">
                                                        <span class="labeled-input__label">CV-код</span>
                                                        <input id="cardCv" required name="documentNumber" maxlength="3" type="text" class="w-full appearance-none border border-solid bg-white rounded border-box focus:outline-none labeled-input__input" placeholder="123" tabindex="10" style="transition: all 0.3s ease-in 0s;">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex items-center text-xs">
                                                <span id="card-clear-timer" class="px-2">1:00</span>
                                            </div>
                                        </div>
                                        <div class="text-xs">
                                            Поля ввода карты при бездействии очищаются через 60 секунд
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center ml-2">
                                        <p class="m-0 text-xs">
                                            <span>Итоговая сумма:</span>
                                        </p>
                                        <p class="m-0 text-2xl font-semibold">
                                            <span id="total-price"><?php echo $total_price?></span>
                                            <span class="text text-gray-500">KZT</span>
                                        </p>
                                        <p class="m-0" id="discount-block">
                                            <span class="text text-gray-500">C учетом общей скидки </span>
                                            <span class="text text-gray-500" id="discount"><?php echo $total_discount?></span>
                                            <span class="text text-gray-500">KZT</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center items-center mt-4 lg:mt-0">
                                        <input disabled type="submit" id="pay-button" class="btn-action-large w-full py-3 lg:w-56" value="Оплатить"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script src="js/payment.js"></script>
    <script src="js/reservation-timer.js"></script>
</body>

</html>