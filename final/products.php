<?php
    require_once "php/db.php";
    $cat_name = "";
    if(isset($_GET["category_id"]) && $_GET["category_id"] != ''){
        $cat_id = $_GET["category_id"];
    }
    else{
        $cat_id = 0;
    }
    $query = "SELECT name FROM product_categories WHERE id=".$cat_id."";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        $cat_name .= "
        <img class='products-dot' src='images/arslan/dot.svg' alt='dot'>
        <a class='products-header-text' href='products.php?category_id=".$cat_id."'>";
        $cat_name .= $row["name"];
        $cat_name .= "</a>";
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
    <script src="js/jquery.js"></script>
    <script src="js/arslan/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="styles/arslan/jquery-ui.min.css">
    <link rel="stylesheet" href="styles/arslan/slider.css">
    <link rel="stylesheet" href="styles/arslan/style.css">
    <title>Jusan Магазин - маркетплейс товаров и услуг в рассрочку и кредит по всему Казахстану</title>
</head>
<body>
    <?php include("php/arslan/jmart_header.php") ?>
    <div class="container" style="padding-bottom: 60px">
        <div class="mx-width pd-std">
            <div class="products-header">
                <a class="products-header-text" href="products.php">
                    Товары
                </a>
                <?php echo $cat_name ?>
            </div>
            <section class="products-main-flex">
                <div class="filter-container">
                    <button id="filter-toggler" class="filter-toggler active" onclick="toggleFilter(event)">
                        <span class="filter-toggler-text">Цена</span>
                        <img class="arrow" src="images/arslan/arrow.svg" alt="arrow"/>
                    </button>
                    <div id="cost-filter-container" class="cost-filter-container active">
                        <div class="price-input-container">
                            <input type="hidden" id="hidden_min_price" value="500"/>
                            <input type="hidden" id="hidden_max_price" value="1500000"/>
                            <div class="price-input-flex">
                                <div class="price-from">
                                    <p class="price-input-text">От</p>
                                    <div class="price-dynamic-input">
                                        <input placeholder="Введите..." class="price-shown" id="min_price_shown" value="500">
                                        <span class="price-tenge">₸</span>
                                    </div>
                                </div>
                                <div class="price-line">
                                    <div style="margin-top: 8px">_</div>
                                </div>
                                <div class="price-to">
                                    <p class="price-input-text">До</p>
                                    <div class="price-dynamic-input">
                                        <input placeholder="Введите..." class="price-shown" id="max_price_shown" value="1 500 000">
                                        <span class="price-tenge">₸</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="price_range_slider"></div>
                    </div>
                </div>
                <div class="products-container">
                    <div class="products-sort">
                        <span style="margin-right: 5px;">Сортировать по: </span>
                        <div class="sort-options">
                            <button class="sort-btn active" data-column="created_at" data-by = "DESC" onClick="sortChange(event)">Новизне</button>
                            <button class="sort-btn" data-column="price" data-by = "ASC" onClick="sortChange(event)">Возрастанию цены</button>
                            <button class="sort-btn" data-column="price" data-by = "DESC" onClick="sortChange(event)">Убыванию цены</button>
                            <button class="sort-btn" data-column="name" data-by = "DESC" onClick="sortChange(event)">Названию</button>
                        </div>
                    </div>
                    <div id="result_filter">
                        
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include("php/arslan/jmart_footer.php")?>
</body>
<script>
//FILTER
$(document).ready(function(){
    filterData();
});

function filterData(){
    var action = "fetch_data";
    var min_price = $("#hidden_min_price").val();
    var max_price = $("#hidden_max_price").val();
    
    var sort = getSort();

    var category_id = "<?php echo $cat_id ?>";
    var search = "<?php if(isset($_GET["search"])) echo $_GET["search"]?>";

    $.ajax({
        url:"php/arslan/fetch_data.php",
        method: "POST",
        data:{action:action, search: search, category_id: category_id, sort: sort, min_price:  min_price, max_price: max_price},
        dataType: "JSON",
            success:function(data){
            $("#result_filter").html(data["output"]);
        }
    });
}

//Finds active sort
function getSort(){
    var sort = document.getElementsByClassName("sort-btn active");
    var sortBy = [sort[0].dataset.column, sort[0].dataset.by];
    return sortBy;
}

//SLIDER FILTER
//Cost slider
$("#price_range_slider").slider({
    range:true,
    min: 500,
    max: 700000,
    values:[400, 1500000],
    step: 500,
    stop:function(event, ui){
        $("#min_price_shown").val(ui.values[0].toLocaleString('ru-RU'));
        $("#max_price_shown").val(ui.values[1].toLocaleString('ru-RU'));
        $("#hidden_min_price").val(ui.values[0]);
        $("#hidden_max_price").val(ui.values[1]);
        filterData();
    }
});

//Min input changed
$("#min_price_shown").change(function () {
    if($(this).val() <= $("#hidden_max_price").val() && $(this).val() >= 500){
        $("#price_range_slider").slider("values", 0, $(this).val());
        $("#hidden_min_price").val($(this).val());
        filterData();
    }
    else{
        alert("Wrong Input!")
    }
});

//Max input changed
$("#max_price_shown").change(function () {
    if($(this).val() >= $("#hidden_min_price").val() && $(this).val() <= 700000){
        $("#price_range_slider").slider("values", 1, $(this).val());
        $("#hidden_max_price").val($(this).val());
        filterData();
    }
    else{
        alert("Wrong Input!")
    }
});

//Toggle cost filter
function toggleFilter(e){
    e.preventDefault();
    document.getElementById("filter-toggler").classList.toggle("active");
    document.getElementById("cost-filter-container").classList.toggle("active");
}

//Filter Toggler
function sortChange(evt) {
    var i, sortLinks;

    // Get all elements and remove class "active"
    sortLinks = document.getElementsByClassName("sort-btn");
    for (i = 0; i < sortLinks.length; i++) {
        sortLinks[i].className = sortLinks[i].className.replace(" active", "");
    }

    // Add an "active" class to the button that opened the tab and filterData
    evt.currentTarget.className += " active";
    filterData();
}

</script>
</html>