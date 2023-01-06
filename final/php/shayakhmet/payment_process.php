<?php
session_start();
require_once "../db.php";

if (!isset($_SESSION['user_id']) || !isset($_POST['total_payment_amount'])) {
    header("Location: ../../index.php");
    die();
}

function calculateBonus($category_id, $total_payment_amount) {
    if ($category_id == 101) {
        $bonus = 0.05 * $total_payment_amount;
    } else {
        $bonus = 0.01 * $total_payment_amount;
    }
    $bonus = round($bonus);
    return $bonus;
}

$user_id = $_SESSION['user_id'];
$category_id = $_POST['categoryID'];
$payment_amount = $_POST['total_payment_amount'];

$balance_query = "SELECT * FROM cards WHERE user_id = '$user_id' AND balance >= $payment_amount";
$balance_result = mysqli_query($conn, $balance_query);

if ($balance_result->num_rows > 0) {
    $conn->begin_transaction();
    $bonus_amount = calculateBonus($category_id, $payment_amount);

    try {
        mysqli_query($conn, "INSERT INTO `payments` (card_id, amount, bonus, category_id) VALUES ((SELECT id FROM `cards` WHERE user_id = $user_id AND type = 1), $payment_amount, $bonus_amount, $category_id)");
        mysqli_query($conn, "UPDATE `cards` SET balance = balance - $payment_amount WHERE user_id = $user_id AND type = 1");
        mysqli_query($conn, "UPDATE `users` SET bonuses = bonuses + $bonus_amount WHERE id = $user_id");
        if ($category_id == 101) { 
            mysqli_query($conn, "DELETE FROM `cart_items` WHERE user_id = $user_id");
        }
    
        $conn->commit();
        header("Location: ../../payments.php");
    } catch (mysqli_sql_exception $exception) {
        $conn->rollback();
        header("Location: ../../payment_form.php?cid=" . $category_id . "&err=1");
    }
} else {
    header("Location: ../../payment_form.php?cid=" . $category_id . "&err=3");
}

$conn->close();
?>