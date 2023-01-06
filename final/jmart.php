<?php
    require_once "php/db.php";
    function createCategoryCardSm($id, $name, $img_name){
        echo "
        <div>
            <a href='products.php?category_id=".$id."'>
                <div class='landing-category-card-sm'>
                    <img width='48px' src='images/arslan/categories/".$img_name.".png' alt='category-".$id."'>
                    <div class='landing-category-card-sm-text'>".$name."</div>
                </div>
            </a>
        </div>";
    }

    function createCategoryCard($id, $name, $img_name) {
        echo 
        "<a href='products.php?category_id=$id'>
            <div class='category-card'>
                <img src='images/arslan/categories/$img_name.png' style='max-height: 113.3px; min-height: 100px' alt='$img_name'>
                <div class='category-card-text'>$name</div>
            </div>
        </a>";
    }

    function createProuctCard($id, $name, $img_name, $cost){
        $div_cost = round($cost/24);
        $cost = number_format($cost, 0, '.', ' ');
        $div_cost = number_format($div_cost, 0, '.', ' ');
        echo "
        <a class='product-card-link' href='product.php?product_id=".$id."'>
            <div class='product-card'>
                <div class='product-img-container'>
                    <img class='product-img landing' src='images/arslan/products/".$img_name."' alt='".$img_name."'>
                </div>
                <div class='product-card-price-container'><span class='product-card-price'>".$cost."₸</span> <span class='product-card-accent'>до 0-0-24</span></div>
                <div class='product-card-bonuses-container'><span class='product-card-bonuses'>10% Б</span> <span class='product-card-accent bg'>$div_cost ₸</span><span class='product-card-text'>x24</span></div>
                <p class='product-card-text name'>".$name."</p>
                <button class='product-card-btn'>подробнее</button>
            </div>
        </a>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Jusan, jmart, жусан, джусан" />
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/arslan/favicon.svg">
    <link rel="stylesheet" href="styles/arslan/style.css">
    <link rel="stylesheet" href="styles/arslan/carousel.css">
    <title>Jusan Магазин - маркетплейс товаров и услуг в рассрочку и кредит по всему Казахстану</title>
</head>
<body>
    <?php include("php/arslan/jmart_header.php") ?>
    <div class="container" style="padding-bottom: 60px;">
        <div class="landing-divisor"></div>
        <div class="mx-width pd-std">
            <section class="main-carousel">
                <div class="carousel-container">
                    <?php
                        $cnt = 1;
                        while($cnt < 15){
                            echo 
                            "
                                <img class='carousel-element-img' src='images/arslan/landing-carousel/landing-carousel-".$cnt.".png' alt='landing-carousel-".$cnt."'>
                            ";
                            $cnt++;
                        }
                    ?>
                </div>
                <div class="slider-controls">
                    <button class="carousel-previous">
                        <img src="images/arslan/carousel-arrow-left.svg">
                    </button>
                    <button class="carousel-next"><img class="carousel-arrow-right" src="images/arslan/carousel-arrow-left.svg"></button>
                </div>
            </section>
            <div class="landing-divisor"></div>
            <section class="landing-categories">
                <div class="landing-categories-links">
                    <div>
                        <a href="catalog.php">
                            <div class="landing-category-card-sm">
                                <img width="48px" src="images/arslan/tovary.png" alt="tovary">
                                <div class="landing-category-card-sm-text">Товары</div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="catalog.php">
                            <div class="landing-category-card-sm">
                                <img width="48px" src="images/arslan/uslugi.png" alt="uslugi">
                                <div class="landing-category-card-sm-text">Услуги</div>
                            </div>
                        </a>
                    </div>
                    <?php 
                        $query_cat_sm = "SELECT * FROM product_categories WHERE id BETWEEN 1 AND 6";
                        $result_cat_sm = mysqli_query($conn, $query_cat_sm);
                        while($row = mysqli_fetch_array($result_cat_sm)) {
                            $img_name = "category-".$row["id"];
                            createCategoryCardSm($row["id"], $row["name"], $img_name);
                        }
                    ?>
                </div>
                <div class="landing-categories-bonuses">
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=8">
                        <img src="images/arslan/categories/landing/landing-cat-1.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=19">
                        <img src="images/arslan/categories/landing/landing-cat-2.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=3">
                        <img src="images/arslan/categories/landing/landing-cat-3.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=16">
                        <img src="images/arslan/categories/landing/landing-cat-4.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=3">
                        <img src="images/arslan/categories/landing/landing-cat-5.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=3">
                        <img src="images/arslan/categories/landing/landing-cat-6.png" alt="landing-category">
                    </a>
                    <a class="landing-categories-bonuses-link" href="products.php?category_id=10">
                        <img src="images/arslan/categories/landing/landing-cat-7.png" alt="landing-category">
                    </a>
                </div>
                <div class="landing-divisor"></div>
            </section>
            <section class="landing-display">
                <div class="landing-display-products">
                    <div class="landing-display-products-header">
                        <h2 class="landing-display-products-header-text">0-0-24: Новый год с новым смартфоном!</h2>
                        <a href="products.php?category_id=1">
                            <div class="more-btn-flex">
                                <span>Все</span>
                                <img src="images/arslan/arrow-right.svg" alt="right-arrow">
                            </div>
                        </a>
                    </div>
                    <div class="landing-display-products-main">
                        <?php
                            $query_mob = "SELECT * FROM products WHERE category_id = 1 ORDER BY RAND() LIMIT 5";
                            $result_mob = mysqli_query($conn, $query_mob);
                            while($row = mysqli_fetch_array($result_mob)) {
                                createProuctCard($row["id"], $row["name"], $row["photo_path"], $row["price"]);
                            }
                        ?>
                    </div>
                </div>
                <div class="landing-divisor"></div>
                <div class="landing-display-categories">
                    <div class="display-category-grid">
                        <?php
                            require_once "php/db.php";
                            $query_cat_1 = "SELECT * FROM product_categories WHERE id BETWEEN 1 AND 12 ORDER BY RAND() LIMIT 6";
                            $result_cat_1 = mysqli_query($conn, $query_cat_1);
                            while($row = mysqli_fetch_array($result_cat_1)) {
                                $img_name = "category-".$row["id"];
                                createCategoryCard($row["id"], $row["name"], $img_name);
                            }
                        ?>
                    </div>
                </div>

                <div class="landing-divisor"></div>

                <div class="landing-display-products">
                    <div class="landing-display-products-header">
                        <h2 class="landing-display-products-header-text">0-0-24: Подарки для работы и учёбы</h2>
                        <a href="products.php?category_id=2">
                            <div class="more-btn-flex">
                                <span>Все</span>
                                <img src="images/arslan/arrow-right.svg" alt="right-arrow">
                            </div>
                        </a>
                    </div>
                    <div class="landing-display-products-main">
                        <?php
                            $query_lap = "SELECT * FROM products WHERE category_id = 2 ORDER BY RAND() LIMIT 5";
                            $result_lap = mysqli_query($conn, $query_lap);
                            while($row = mysqli_fetch_array($result_lap)) {
                                createProuctCard($row["id"], $row["name"], $row["photo_path"], $row["price"]);
                            }
                        ?>
                    </div>
                </div>
                <div class="landing-divisor"></div>
                <div class="landing-display-categories">
                    <div class="display-category-grid">
                        <?php
                            require_once "php/db.php";
                            $query_cat_2 = "SELECT * FROM product_categories WHERE id BETWEEN 13 AND 25 ORDER BY RAND() LIMIT 6";
                            $result_cat_2 = mysqli_query($conn, $query_cat_2);
                            while($row = mysqli_fetch_array($result_cat_2)) {
                                $img_name = "category-".$row["id"];
                                createCategoryCard($row["id"], $row["name"], $img_name);
                            }
                        ?>
                    </div>
                </div>
                
                <div class="landing-divisor"></div>

                <div class="landing-display-products">
                    <div class="landing-display-products-header">
                        <h2 class="landing-display-products-header-text">0-0-24: Полезные подарки для дома</h2>
                        <a href="products.php?category_id=3">
                            <div class="more-btn-flex">
                                <span>Все</span>
                                <img src="images/arslan/arrow-right.svg" alt="right-arrow">
                            </div>
                        </a>
                    </div>
                    <div class="landing-display-products-main">
                        <?php
                            $query_byt = "SELECT * FROM products WHERE category_id = 3 ORDER BY RAND() LIMIT 5";
                            $result_byt = mysqli_query($conn, $query_byt);
                            while($row = mysqli_fetch_array($result_byt)) {
                                createProuctCard($row["id"], $row["name"], $row["photo_path"], $row["price"]);
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include("php/arslan/jmart_footer.php")?>
</body>
<script type="module" src="js/arslan/landingCarousel.js"></script>
</html>