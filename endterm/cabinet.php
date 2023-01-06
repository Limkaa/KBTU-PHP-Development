<?php
session_start();
require('db.php');
require('php/reservation/clear_reservations.php');

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}

$reservation_time_delta = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="сми, Chocotravel, чокотревел" />
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="https://www.chocotravel.com/favicon.png">
    <title>Дешевые авиабилеты онлайн: купить авиабилеты в Казахстане. Поиск и бронирование билетов на самолет по доступным ценам</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles/shayakhmet/cabinet.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/booking.css">
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

        <div class="container">
            <div class="content-center">
                <div id="choco-cabinet" class="choco-cabinet-container">
                    <section>
                        <div class="upper_cabinet">
                            <div class="upper_cabinet_inner">
                                <div class="upper_cabinet_inner_titlespace">
                                    <h2 class="upper_cabinet_title">Личный кабинет</h2>
                                    <p><?php echo $_SESSION["email"]?></p>
                                </div>
                            </div>
                        </div>
                        <section>
                            <div class="lower_cabinet">
                                <a href="search.php" class="primary_button">Найти новые билеты</a>
                                <a href="reservation.php" class="primary_button">Забронировать билеты последнего поискового запроса</a>
                                <a href='set_session.php' class='primary_button'>Билеты для трансфера</a>
                                <a href='payment.php' class='primary_button' style='background-color: #fe9922;'>Оплата текущего бронирования</a>
                            </div>
                            <div class="space-y-5">
                                <?php 
                                $user_id = $_SESSION['id'];
                                $query = "SELECT * FROM reservation WHERE user_id=$user_id AND payment_id IS NULL";
                                $reservations = mysqli_query($conn,  $query);
                                
                                if ($reservations->num_rows > 0) {
                                    include('php/reservation/reserved_items.php');
                                }
                                ?>
                            </div>
                            <div class="space-y-5">
                                <?php 
                                
                                $tickets_of_user = "SELECT f.*,
                                    fl.code AS code, 
                                    fl.departure_time AS departure_time, 
                                    fl.arrival_time AS arrival_time, 
                                    fl.price_economy AS price_economy, 
                                    fl.price_business AS price_business, 
                                    al.id AS airline_id,
                                    al.name AS airline_name,
                                    al.image AS airline_image,
                                    cit_dep.code AS cit_dep_code,
                                    cit_dep.name AS cit_dep_name,
                                    cit_arr.code AS cit_arr_code,
                                    cit_arr.name AS cit_arr_name
                                    FROM `tickets` AS f
                                    LEFT JOIN flights AS fl
                                    ON f.flight_id = fl.id
                                    LEFT JOIN airlines AS al 
                                    ON fl.airline_id = al.id
                                    LEFT JOIN cities AS cit_dep 
                                    ON fl.departure_city_id = cit_dep.id
                                    LEFT JOIN cities AS cit_arr 
                                    ON fl.arrival_city_id = cit_arr.id
                                    WHERE reservation_id IN (SELECT id FROM reservation WHERE user_id = $user_id AND payment_id IS NOT NULL)
                                    ORDER BY departure_time DESC
                                ";

                                $tickets = mysqli_query($conn, $tickets_of_user);
                                
                                if ($tickets->num_rows > 0) {
                                    include('php/cabinet/tickets.php');
                                } 
                                else {
                                ?>
                                <div class="empty_orders_wrapper_outer">
                                    <div class="empty_orders_wrapper">
                                        <img src="images/shayakhmet/empty-orders.webp" class="empty_orders_image">
                                        <div>
                                            <h5 class="empty_orders_big_text">У вас еще нет билетов</h5>
                                            <p class="empty_orders_text">Воспользуйтесь поиском<br>и отправляйтесь в путешествие</p>
                                            <a href="search.php" class="empty_orders_button">Найти билеты</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                    </section>
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

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/shayakhmet/cabinet.js'></script>
    <script src="js/reservation-timer.js"></script>
</body>

</html>