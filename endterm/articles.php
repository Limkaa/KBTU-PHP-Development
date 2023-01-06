<?php
session_start();

function createArticle($title, $description, $publish_date, $name, $image, $website) {
    echo "<div class='article_tab'>
    <div class='article_image_tab' style='background: url(\"images/article-sources/$image\") center no-repeat;background-size: contain;'></div>
    <div class='article_heading_tab'>
        <p class='heading-action-small'>
            $title
        </p>
    </div>
    <a class='nofollowlink' data-link='$website'>
        <div class='short_desc_container'>
            $description
        </div>
    </a>
    <div class='article_txt_tab'>
        <p class='txt-action-small' style='margin-top: 10px;'>
            Источник:
            <a class='nofollowlink' data-link='$website'>$name</a>
        </p>
    </div>
    <div class='article_txt_tab'>
        <p class='txt-action-small'>
            Опубликовано: $publish_date
        </p>
    </div>
    </div>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>СМИ о нас</title>
    <meta name="description" content="" />
    <meta name="keywords" content="сми, Chocotravel, чокотревел" />
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
                <a class="nav__link nav__link--active" href="articles.php">
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
        <div class="center">
            <div class="content" style="margin-bottom: 30px;">
                <div class="content-center">
                    <h1 class="heading-action-medium" style="text-align: center; margin-block-start: 0.67em;
                        margin-block-end: 0.67em;">СМИ о нас</h1>
                    <div class="content">
                        <div id="articles">
                            <?php 
                                require_once "db.php";

                                $sql = "SELECT title, description, publish_date, name, image, website FROM articles LEFT JOIN sources on articles.source_id = sources.id";
                                $result = $conn->query($sql);
                                foreach($result as $key => $row) {
                                    createArticle($row['title'], $row['description'], $row['publish_date'], $row['name'], $row['image'], $row['website']);
                                }
                            ?>

                            <div class="article_tab" style="display:none">
                                <div class="article_image_tab"></div>
                                <div class="article_heading_tab">
                                    <p class="heading-action-small">
                                        TEXT
                                    </p>
                                </div>
                                <a class="nofollowlink">
                                    <div class="short_desc_container">
                                        TEXT
                                    </div>
                                </a>
                                <div class="article_txt_tab">
                                    <p class="txt-action-small" style="margin-top: 10px;">
                                        TEXT
                                        <a class="nofollowlink">TEXT</a>
                                    </p>
                                </div>
                                <div class="article_txt_tab">
                                    <p class="txt-action-small">
                                        TEXT
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
</body>

</html>