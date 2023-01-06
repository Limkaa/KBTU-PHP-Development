<?php
session_start();
require('php/alim/auth_required.php');

$user_id = $_SESSION['user_id'];

$categoryID = $_GET["cid"];
$allowed = ['41','42','43','44','51','52','53','61','62','63','101']; // list of allowed IDs

$checkAllowed = array_search($categoryID, $allowed, true); // see if we have such an ID
if ($checkAllowed === false) { 
    header("location: payments.php");
    exit;
}

require_once "php/db.php";

// This is to get an image & name from payment_categories
$sql = "SELECT * FROM payment_categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $categoryID);
$stmt->execute();
$result = $stmt->get_result();
$value = $result->fetch_object();
?>

<!DOCTYPE html>
<html lang="ru-KZ">
    <head>
        <title>Совершить платеж</title>
        <script src="js/jquery.js"></script>
        <!-- <script src="js/shayakhmet/payment_form.js"></script> -->
        <link rel="stylesheet" href="styles/aizar/header.css">
        <link rel="stylesheet" href="styles/aizar/styles.css">
        <link rel="stylesheet" type="text/css" href="./styles/shayakhmet/payment_form.css">
    </head>
    <body>
        <?php include("php/aizar/jusan_header.php") ?>
        <div class="main">
            <div class="main_inside_1">
                <div class="main_inside_2">
                    <div class="main_content">
                        <div class="main_content_1">
                            <div class="back_container">
                                <img src="images/shayakhmet/left-arrow.png">
                                <a href="payments.php"><span></span></a>
                            </div>
                        </div>
                        <div class="main_content_2">
                            <div class="form_container">
                                <form method="post" action="php/shayakhmet/payment_process.php">
                                    <div class="form_top">
                                        <div class="form_image_container">
                                            <img src=" <?php echo '' . $value->icon_path . ''; ?> ">
                                        </div>
                                        <div class="form_name_container">
                                            <h1><?php echo '' . $value->name . ''; ?></h1>
                                        </div>
                                    </div>
                                    <div class="form_bottom">
                                        <input name="categoryID" type="number" class="hidden" id="categoryID" value="<?php echo $categoryID?>">
                                        <div class="input-group">
                                            <div class="input-box">
                                                <?php if ($categoryID == 101) {
                                                    $shopping_cart_payment_amount = $_SESSION['shopping_cart_payment_amount']
                                                ?>
                                                    <h2>Сумма платежа: <?php echo $shopping_cart_payment_amount?> тенге</h2>
                                                    <p>Вы получите бонус 5% от общей суммы платежа</p>
                                                    <input type="number" min="1" step="any" name="total_payment_amount" required class="hidden" value="<?php echo $shopping_cart_payment_amount?>">
                                                <?php } else { ?>
                                                    <p>Вы получите бонус 1% от общей суммы платежа</p>
                                                    <input type="number" min="1" step="any" placeholder="Сумма платежа" name="total_payment_amount" required class="input_name">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                            if (isset($_GET["err"]) && $_GET["err"] == 1) {
                                                echo "<span class='error-text'>Произошла ошибка: проверьте правильность введенных данных</span><br>";
                                            } 
                                            if (isset($_GET["err"]) && $_GET["err"] == 2) {
                                                echo "<span class='error-text'>Неправильный номер кредитной карты</span><br>";
                                            }
                                            if (isset($_GET["err"]) && $_GET["err"] == 3) {
                                                echo "<span class='error-text'>Недостаточно средств</span><br>";
                                            } 
                                        ?>
                                        <div class="input-group">
                                            <div class="input-box">
                                                <button id="pay-button" type="submit">Оплатить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="main_content_3"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>