<?php
session_start();
require_once('php/alim/auth_required.php');
$user_id=$_SESSION['user_id'];

$total_payment_amount = 0;

function createCartItem($id, $name, $quantity, $price) {
    echo "<tr id='#cartitem-$id'>
        <td class='tablecell_left'><strong>$name</strong></td>
        <td class='tablecell_right'>$quantity</td>
        <td class='tablecell_right'>" . $price . "</td>
        <td class='tablecell_center'><button class='button remove_button' value='$id'>Удалить?</button></td>
    </tr>";
}

require_once "php/db.php";

$sql = "SELECT cart_items.id AS id, products.name AS name, quantity, products.price AS price FROM cart_items LEFT JOIN products on cart_items.product_id = products.id WHERE user_id = $user_id;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru-KZ">
    <head>
        <title>Корзина</title>
        <script src="js/jquery.js"></script>
        <script src="js/shayakhmet/shopping_cart.js"></script>
        <link rel="stylesheet" type="text/css" href="./styles/shayakhmet/shopping_cart.css">
    </head>
    <body>
        <div class="main">
            <div class="main_inside_1">
                <div class="main_inside_2">
                    <div class="main_content">
                        <div class="main_content_1">
                            <div class="back_container">
                                <img src="images/shayakhmet/left-arrow.png">
                                <a href="catalog.php"><span></span></a>
                            </div>
                        </div>
                        <div class="main_content_2">
                            <?php if ($result->num_rows == 0) {?>
                            <div class="empty_cart">
                                <h2>Ваша корзина пуста</h2>
                            </div>
                            <?php } else { ?>
                            <div class="cart_container">
                                <div class="cart_top">
                                    <h1>Корзина</h1>
                                </div>
                                <div class="cart_main">
                                    <table cellpadding="10" cellspacing="1">
                                        <tbody>
                                            <tr class="tablehead">
                                                <th class="tablecell_left"><strong>Название</strong></th>
                                                <th class="tablecell_right"><strong>Количество</strong></th>
                                                <th class="tablecell_right"><strong>Цена</strong></th>
                                                <th class="tablecell_center"><strong>Удалить?</strong></th>
                                            </tr>
                                            <?php 
                                                foreach($result as $key => $row) {
                                                    createCartItem($row['id'], $row['name'], $row['quantity'], $row['price']);
                                                    $total_payment_amount += ($row["price"] * $row["quantity"]);
                                                }
                                            ?>
                                            <tr class="tablefoot">
                                                <td colspan="2" align=right><strong>Полная цена:</strong></td>
                                                <td align=right><?php echo $total_payment_amount; ?></td>
                                                <?php $_SESSION['shopping_cart_payment_amount'] = $total_payment_amount; ?>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart_bottom">
                                    <div class="input-group">
                                        <!-- <div class="input-box">
                                            <button class="button big_button" id="empty-button">Удалить все</button>
                                        </div> -->
                                        <div class="input-box">
                                            <a href="payment_form.php?cid=101" class="button big_button" id="pay-button">Оплатить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
