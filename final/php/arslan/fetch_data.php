<?php
    require_once "../db.php";
    $return_array = array();

    function createProuctCard($id, $name, $img_name, $cost){
        $div_cost = round($cost/24);
        $cost = number_format($cost, 0, '.', ' ');
        $div_cost = number_format($div_cost, 0, '.', ' ');
        return "
        <a class='product-card-link' href='product.php?product_id=".$id."'>
            <div class='product-card'>
                <div class='product-img-container'>
                    <img class='product-img' src='images/arslan/products/".$img_name."' alt='".$img_name."'>
                </div>
                <div class='product-card-price-container'><span class='product-card-price'>".$cost."₸</span> <span class='product-card-accent'>до 0-0-24</span></div>
                <div class='product-card-bonuses-container'><span class='product-card-bonuses'>10% Б</span> <span class='product-card-accent bg'>$div_cost ₸</span><span class='product-card-text'>x24</span></div>
                <p class='product-card-text name'>".$name."</p>
                <button class='product-card-btn'>подробнее</button>
            </div>
        </a>";
    }

    if(isset($_POST["action"])){
        $query = "SELECT * FROM products WHERE 1 ";
        if(isset($_POST["category_id"]) && $_POST["category_id"] != "" && $_POST["category_id"] != "0"){
            $query .= "AND category_id = ".$_POST["category_id"]." ";
        }
        if(isset($_POST["search"]) && $_POST["search"] != ""){
            $query .= "AND name LIKE '%".$_POST["search"]."%' ";
        }
        if(isset($_POST["max_price"]) && isset($_POST["max_price"]) && 
        !empty($_POST["min_price"]) && !empty($_POST["max_price"])){
            $query .= "AND price BETWEEN '".$_POST["min_price"]."' AND '".$_POST["max_price"]."' ";
        }
        if(isset($_POST["sort"])){
            $sort_column = $_POST["sort"][0];
            $sort_by = $_POST["sort"][1];
            $query .= "ORDER BY ".$sort_column." ".$sort_by." ";
        }
        $result = mysqli_query($conn, $query);
        $total_rows = mysqli_num_rows($result);
        $output = "<div class='products-showcase'>";
        while($row = mysqli_fetch_array($result)){
            $output .= createProuctCard($row["id"], $row["name"], $row["photo_path"], $row["price"]);
        }
        $output .= "</div>";
        if($total_rows == 0){
            $output = "
            <div class='item-not-found'>
                <div class='item-not-found-container'>
                    <img src='images/arslan/item-not-found.svg' alt='item-not-found'>
                    <h2 class='item-not-found-header'>Товаров не найдено</h2>
                    <p class='item-not-found-text'>Попробуйте изменить параметры поиска</p>
                    <a class='item-not-found-btn' href='jmart.php'>На главную</a>
                </div>
            </div>";
        }
        $return_array = array("output" => $output,
                            "product_num" => $total_rows);
        echo json_encode($return_array);
    }
    
?>