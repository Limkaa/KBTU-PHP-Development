<?php
    session_start();
    require("db.php");
    //GENERAL
    $show_tickets = 0;
    $min_price = 0;
    $filter_back_sec = "";
    if(isset($_GET["depart_city_id"]) && $_GET["depart_city_id"] != ''){
        $city_query = "SELECT name FROM cities WHERE id =".$_GET["depart_city_id"]."";
        $city_result = mysqli_query($conn, $city_query);
        while($row = mysqli_fetch_array($city_result)){
            $dept_city = $row["name"];
        }

        $city_query_dest = "SELECT name FROM cities WHERE id=".$_GET["dest_city_id"]."";
        $city_result_dest = mysqli_query($conn, $city_query_dest);
        while($row = mysqli_fetch_array($city_result_dest)){
            $dest_city = $row["name"];
        }

        if($_GET["back-date"] != ''){
            $filter_back_sec = '
            <section class="advanced-filter-general">
                <div class="advanced-filter-header">
                    <h2 class="advanced-filter-header-text"><img class="plane-filter-img" style="transform: rotate(180deg);" src="images/arslan/search/airplane.svg"/><span>'.$dest_city.' - '.$dept_city.'</span></h2>
                    <div class="advanced-filter-grid-not-general">
                        <div class="transit-filter">
                            <p class="filter-header">Пересадки</p>
                            <div class="filter-transit">
                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">Прямой</label>
                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">1 пересадка</label>
                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">2 пересдка или более</label>
                            </div>
                        </div>
                        <div class="dept-time-filter">
                            <p class="filter-header">Вылет</p>
                            <input type="hidden" id="hidden_min_time_dept_back" value="00:00"/>
                            <input type="hidden" id="hidden_max_time_dept_back" value="24:00"/>
                            <p id="time-back-dept-show" class="time-there-show">00:00 — 24:00</p>
                            <div id="time_range_back_dept_slider"></div>
                        </div>
                        <div class="dest-time-filter">
                            <p class="filter-header">Прилет</p>
                            <input type="hidden" id="hidden_min_time_dest_back" value="00:00"/>
                            <input type="hidden" id="hidden_max_time_dest_back" value="24:00"/>
                            <p id="time-back-dest-show" class="time-there-show">00:00 — 24:00</p>
                            <div id="time_range_back_dest_slider"></div>
                        </div>
                    </div>    
                </div>
            </section>';
        }
        $show_tickets = 1;
        $min_price = 1;

        // AIRLINE COMPANIES NAMES FOR FILTER
        $company_query = "SELECT name,id FROM airlines";
        $company_result = mysqli_query($conn, $company_query);
        $airline_list = '';
        while($row = mysqli_fetch_array($company_result)){
            $airline_list .= '<label class="common-selector-label"><input type="checkbox" class="common-selector airline" value="'.$row["id"].'">'.$row["name"].'</label>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/arslan/jquery-ui.min.css">
    <link rel="stylesheet" href="styles/arslan/slider.css">
    <link rel="stylesheet" href="styles/arslan/style.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дешевые авиабилеты онлайн: купить авиабилеты в Казахстане. Поиск и бронирование билетов на самолет по доступным ценам</title>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            <?php include("php/searchbar.php") ?>
            <section class="search-tab">
                <?php if($show_tickets == 0){
                    echo '
                    <div class="search-info">
                        <div class="search-tabs">
                            <button class="search-tabbutton" onclick="openCity(event, \'Airplane\')" id="defaultOpen">Авиабилеты от 0 ₸</button>
                            <button class="search-tabbutton" onclick="openCity(event, \'Train\')">Ж/Д билеты от 0 ₸</button>
                        </div>
                        <p class="search-info-text">Указано местное время отправления и прибытия</p>
                    </div>
                    <div class="search-content">
                        <div id="Airplane" class="search-tabcontent">
                            <div class="search-not-found">
                                <h1 class="search-not-found-header">ой...</h1>
                                <p class="search-not-found-text">По вашему запросу не найдено ни одного билета.<br>Попробуйте изменить параметры поиска</p>
                                <img src="images/arslan/search/airplane--gray.svg" alt="" class="search-not-found-img">
                            </div>
                        </div>
                        <div id="Train" class="search-tabcontent">
                            <div class="search-not-found">
                                <h1 class="search-not-found-header">ой...</h1>
                                <p class="search-not-found-text">По вашему запросу не найдено ни одного билета.<br>Попробуйте изменить параметры поиска</p>
                                <img src="images/arslan/search/airplane--gray.svg" alt="" class="search-not-found-img">
                            </div>
                        </div>
                    </div>
                ';}
                else{
                    echo'
                    <div class="search-info">
                        <div class="search-tabs">
                            <button class="search-tabbutton" onclick="openCity(event, \'result_filter\')" id="defaultOpen">Авиабилеты от <span id="min-price"></span>₸</button>
                            <button class="search-tabbutton" onclick="openCity(event, \'Train\')" disabled>Ж/Д билеты от 0 ₸</button>
                        </div>
                        <p class="search-info-text">Указано местное время отправления и прибытия</p>
                    </div>
                    <div class="search-filter">
                        <div class="search-filter-header">
                            <div id="filter-companies-tab" class="filter-companies-tab">
                                    '.$airline_list.'
                            </div>
                            <button id="filter-toggler" class="filter-toggler" onclick="toggleAdvancedFilter(event)"><img class="filter-img" src="images/arslan/search/filters-icon--white.svg"/><span style="margin-right: 0.75rem;">ПОКАЗАТЬ ФИЛЬТРЫ</span><span class="arrow bold"></button>
                        </div>
                        <div id="search-advanced-filter" class="search-advanced-filter">
                            <section class="advanced-filter-general">
                                <div class="advanced-filter-header">
                                    <h2 class="advanced-filter-header-text">Общие параметры</h2>
                                    <div class="advanced-filter-grid-general">
                                        <span class="search-fiter-companies-container">
                                            <p class="filter-header"></p>
                                            <button id="search-filter-companies-in-advanced" class="search-filter-companies-in-advanced" onclick="toggleCompanyFilterInAdvanced(event)">Авиакомпании<span class="arrow"></span></button>
                                            <div id="filter-companies-tab-in-advanced" class="filter-companies-tab">
                                                '.$airline_list.'
                                            </div>
                                        </span>
                                        <div class="dept-time-filter">
                                            <p class="filter-header">Цена билета</p>
                                            <input type="hidden" id="hidden_min_price" value="1000"/>
                                            <input type="hidden" id="hidden_max_price" value="1300000"/>
                                            <p id="price_show" class="price-show-text time-there-show"><span id="min_price_shown">от 1000</span> <span id="max_price_shown">по 1300000</span></p>
                                            <div id="price_range_slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="advanced-filter-general">
                                <div class="advanced-filter-header">
                                    <h2 class="advanced-filter-header-text"><img class="plane-filter-img" src="images/arslan/search/airplane.svg"/><span>'.$dept_city.' - '.$dest_city.'</span></h2>
                                    <div class="advanced-filter-grid-not-general">
                                        <div class="transit-filter">
                                            <p class="filter-header">Пересадки</p>
                                            <div class="filter-transit">
                                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">Прямой</label>
                                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">1 пересадка</label>
                                                <label class="common-selector-label-in-advanced"><input type="checkbox" class="common-selector-1 airline" value="1">2 пересдка или более</label>
                                            </div>
                                        </div>
                                        <div class="dept-time-filter">
                                            <p class="filter-header">Вылет</p>
                                            <input type="hidden" id="hidden_min_time_dept_there" value="00:00"/>
                                            <input type="hidden" id="hidden_max_time_dept_there" value="24:00"/>
                                            <p id="time-there-dept-show" class="time-there-show">00:00 — 24:00</p>
                                            <div id="time_range_there_dept_slider"></div>
                                        </div>
                                        <div class="dest-time-filter">
                                            <p class="filter-header">Прилет</p>
                                            <input type="hidden" id="hidden_min_time_dest_there" value="00:00"/>
                                            <input type="hidden" id="hidden_max_time_dest_there" value="24:00"/>
                                            <p id="time-there-dest-show" class="time-there-show">00:00 — 24:00</p>
                                            <div id="time_range_there_dest_slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>'.$filter_back_sec.'
                        </div>
                    </div>
                    <div class="search-filter-subdiv">
                    </div>
                    <div class="search-content">
                        <div id="result_filter" class="result_filter">
                            
                        </div>
                    </div>
                    ';
                }
                ?>
            </section>
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
</body>
<script>
    //BUY TICKET BUTTON
    function buyTicketOneWay(idid){
        jQuery(document).ready(function($) {
            $.ajax({
                url:"php/buy_ticket.php",
                method: "POST",
                data:{
                    id_there: idid,
                },
                success:function(data){
                    window.location.href = "reservation.php";
                }
            });
        });   
    }

    function buyTicketTwoWay(idThere, idBack){
        jQuery(document).ready(function($) {
            $.ajax({
                url:"php/buy_ticket.php",
                method: "POST",
                data:{
                    id_there: idThere,
                    id_back: idBack,
                },
                success:function(data){
                    window.location.href = "reservation.php";
                }
            });
        });
    }

    //PUT VALUES INTO SEARCHBOX
    $('#depart_city_id').val('<?php echo $_GET["depart_city_id"]?>');
    $('#depart').val('<?php echo $_GET["depart_city_name"]?>');
    $('#dest_city_id').val('<?php echo $_GET["dest_city_id"]?>');
    $('#dest').val('<?php echo $_GET["dest_city_name"]?>');

    // $('#there-date').val('<?php if(isset($_GET["there-date"])) echo $_GET["there-date"]?>');
    // $('#back-date').val('<?php if(isset($_GET["back-date"])) echo $_GET["back-date"]?>');
    // $('#datepicker').val('<?php if(isset($_GET["date"])) echo $_GET["date"]?>');

    //Filter itself
    $(document).ready(function(){
        filterData();

        function filterData(){
            var action = "fetch_data";
            var min_price = $("#hidden_min_price").val();
            var max_price = $("#hidden_max_price").val();

            var min_time_there_dept = $("#hidden_min_time_dept_there").val();
            var max_time_there_dept = $("#hidden_max_time_dept_there").val();



            var min_time_there_dest = $("#hidden_min_time_dest_there").val();
            var max_time_there_dest = $("#hidden_max_time_dest_there").val();

            //////

            var min_time_back_dept = $("#hidden_min_time_dept_back").val();
            var max_time_back_dept = $("#hidden_max_time_dept_back").val();

            var min_time_back_dest = $("#hidden_min_time_dest_back").val();
            var max_time_back_dest = $("#hidden_max_time_dest_back").val();

            var dept_id = "<?php if(isset($_GET["depart_city_id"])) echo $_GET["depart_city_id"]?>";
            var dest_id = "<?php if(isset($_GET["dest_city_id"])) echo $_GET["dest_city_id"]?>";

            var dept_time = "<?php if(isset($_GET["there-date"])) echo $_GET["there-date"]?>";
            var dept_time_back = "<?php if(isset($_GET["back-date"])) echo $_GET["back-date"]?>"

            var airline = getFilter('airline');

            $.ajax({
                url:"php/search_filter.php",
                method: "POST",
                data:{action:action, dept_time, dept_id:dept_id, dest_id:dest_id, airline:airline, 
                min_time_there_dept: min_time_there_dept, max_time_there_dept: max_time_there_dept,
                min_time_there_dest: min_time_there_dest, max_time_there_dest: max_time_there_dest,
                dept_time_back: dept_time_back, min_time_back_dept: min_time_back_dept, max_time_back_dept: max_time_back_dept,
                min_time_back_dest: min_time_back_dest, max_time_back_dest: max_time_back_dest,
                min_price:  min_price, max_price: max_price},
                dataType: "JSON",
                success:function(data){
                    $("#result_filter").html(data["output"]);
                    $("#min-price").html(data["min_price"]);
                }
            });
        }
        
        function getFilter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $(".common-selector").click(function(){
            filterData();
        });

        //SLIDER FILTERS
        //Time there
        $("#time_range_there_dept_slider").slider({
            range: true,
            min: 0,
            max: 1440,
            values:[0, 1440],
            step: 30,
            stop: function(event, ui) {
                var hoursMin = Math.floor(ui.values[0] / 60);
                var minutesMin = ui.values[0] - (hoursMin * 60);

                if(hoursMin.toString().length == 1) hoursMin = '0' + hoursMin;
                if(minutesMin.toString().length == 1) minutesMin = '0' + minutesMin;

                ///////
                var hoursMax = Math.floor(ui.values[1] / 60);
                var minutesMax = ui.values[1] - (hoursMax * 60);

                if(hoursMax.toString().length == 1) hoursMax = '0' + hoursMax;
                if(minutesMax.toString().length == 1) minutesMax = '0' + minutesMax;

                $("#hidden_min_time_dept_there").val(hoursMin+':'+minutesMin);
                $("#hidden_max_time_dept_there").val(hoursMax+':'+minutesMax);
                $('#time-there-dept-show').html(hoursMin+':'+minutesMin + " — " + hoursMax+':'+minutesMax);
                filterData();
            }
        });

        $("#time_range_there_dest_slider").slider({
            range: true,
            min: 0,
            max: 1440,
            values:[0, 1440],
            step: 30,
            stop: function(event, ui) {
                var hoursMin = Math.floor(ui.values[0] / 60);
                var minutesMin = ui.values[0] - (hoursMin * 60);

                if(hoursMin.toString().length == 1) hoursMin = '0' + hoursMin;
                if(minutesMin.toString().length == 1) minutesMin = '0' + minutesMin;

                ///////
                var hoursMax = Math.floor(ui.values[1] / 60);
                var minutesMax = ui.values[1] - (hoursMax * 60);

                if(hoursMax.toString().length == 1) hoursMax = '0' + hoursMax;
                if(minutesMax.toString().length == 1) minutesMax = '0' + minutesMax;

                $("#hidden_min_time_dest_there").val(hoursMin+':'+minutesMin);
                $("#hidden_max_time_dest_there").val(hoursMax+':'+minutesMax);
                $('#time-there-dest-show').html(hoursMin+':'+minutesMin + " — " + hoursMax+':'+minutesMax);
                filterData();
            }
        });

        //Time back
        $("#time_range_back_dept_slider").slider({
            range: true,
            min: 0,
            max: 1440,
            values:[0, 1440],
            step: 30,
            stop: function(event, ui) {
                var hoursMin = Math.floor(ui.values[0] / 60);
                var minutesMin = ui.values[0] - (hoursMin * 60);

                if(hoursMin.toString().length == 1) hoursMin = '0' + hoursMin;
                if(minutesMin.toString().length == 1) minutesMin = '0' + minutesMin;

                ///////
                var hoursMax = Math.floor(ui.values[1] / 60);
                var minutesMax = ui.values[1] - (hoursMax * 60);

                if(hoursMax.toString().length == 1) hoursMax = '0' + hoursMax;
                if(minutesMax.toString().length == 1) minutesMax = '0' + minutesMax;

                $("#hidden_min_time_dept_back").val(hoursMin+':'+minutesMin);
                $("#hidden_max_time_dept_back").val(hoursMax+':'+minutesMax);
                $('#time-back-dept-show').html(hoursMin+':'+minutesMin + " — " + hoursMax+':'+minutesMax);
                filterData();
            }
        });

        $("#time_range_back_dest_slider").slider({
            range: true,
            min: 0,
            max: 1440,
            values:[0, 1440],
            step: 30,
            stop: function(event, ui) {
                var hoursMin = Math.floor(ui.values[0] / 60);
                var minutesMin = ui.values[0] - (hoursMin * 60);

                if(hoursMin.toString().length == 1) hoursMin = '0' + hoursMin;
                if(minutesMin.toString().length == 1) minutesMin = '0' + minutesMin;

                ///////
                var hoursMax = Math.floor(ui.values[1] / 60);
                var minutesMax = ui.values[1] - (hoursMax * 60);

                if(hoursMax.toString().length == 1) hoursMax = '0' + hoursMax;
                if(minutesMax.toString().length == 1) minutesMax = '0' + minutesMax;

                $("#hidden_min_time_dest_back").val(hoursMin+':'+minutesMin);
                $("#hidden_max_time_dest_back").val(hoursMax+':'+minutesMax);
                $('#time-back-dest-show').html(hoursMin+':'+minutesMin + " — " + hoursMax+':'+minutesMax);
                filterData();
            }
        });


        $("#price_range_slider").slider({
            range:true,
            min: 1000,
            max: 1300000,
            values:[1000, 1300000],
            step: 500,
            stop:function(event, ui){
                $("#min_price_shown").html("от "+ui.values[0]);
                $("#max_price_shown").html("по "+ui.values[1]);
                $("#hidden_min_price").val(ui.values[0]);
                $("#hidden_max_price").val(ui.values[1]);
                filterData();
            }
        });
    });

    //Filter block
    function toggleCompanyFilter(e){
        e.preventDefault();
        document.getElementById("filter-companies-tab").classList.toggle("active");
        document.getElementById("search-filter-companies").classList.toggle("active");
    }

    function toggleCompanyFilterInAdvanced(e){
        e.preventDefault();
        document.getElementById("filter-companies-tab").classList.toggle("shown");
        document.getElementById("filter-companies-tab").classList.toggle("active");
        document.getElementById("search-filter-companies-in-advanced").classList.toggle("active");
    }

    okk = 1;

    function toggleAdvancedFilter(e){
        e.preventDefault();
        document.getElementById("filter-toggler").classList.toggle("active");
        document.getElementById("search-advanced-filter").classList.toggle("active");
        document.getElementById("search-filter-companies-container").classList.toggle("shown");
    }

    //Tabular thingy with airlines and trains
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;

        // Get all elements
        tabcontent = document.getElementsByClassName("search-tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements and remove class "active"
        tablinks = document.getElementsByClassName("search-tabbutton");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
    
</script>

</html>