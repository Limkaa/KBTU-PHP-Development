<?php
    function createCategoryCard($id, $name, $img_name) {
        echo 
        "<a href='products.php?category_id=$id'>
            <div class='category-card'>
                <img src='images/arslan/categories/$img_name.png' style='max-height: 113.3px; min-height: 100px' alt='$img_name'>
                <div class='category-card-text'>$name</div>
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
    <title>Jusan Магазин - маркетплейс товаров и услуг в рассрочку и кредит по всему Казахстану</title>
</head>
<body>
    <?php include("php/arslan/jmart_header.php") ?>
    <div class="container">
        <div class="mx-width pd-std">
            <section class="category-section">
                <h1 class="category-header">Товары</h1>
                <div class="display-category-grid">
                    <?php
                        require_once "php/db.php";
                        $query = "SELECT * FROM product_categories WHERE id BETWEEN 1 AND 20";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)) {
                            $img_name = "category-".$row["id"];
                            createCategoryCard($row["id"], $row["name"], $img_name);
                        }
                    ?>
                </div>
            </section>
            <section class="category-section">
                <h1 class="category-header">Услуги</h1>
                <div class="display-category-grid">
                    <?php
                        require_once "php/db.php";
                        $query = "SELECT * FROM product_categories WHERE id BETWEEN 21 AND 30";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)) {
                            $img_name = "category-".$row["id"];
                            createCategoryCard($row["id"], $row["name"], $img_name);
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
    <?php include("php/arslan/jmart_footer.php")?>
</body>
</html>