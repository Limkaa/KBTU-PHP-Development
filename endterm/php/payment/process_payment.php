<?php
session_start();
require(dirname(dirname(dirname(__FILE__)))."/db.php");

if (!isset($_POST['cardNumber']) || !isset($_POST['cardType'])) {
    header("Location: http://localhost/endterm/payment.php");
    die();
}

$user_id = $_SESSION['id'];
$reservation_id = $_SESSION['reservation_id'];
$payment_amount = $_SESSION['total_payment_amount'];
$card_number = $_POST['cardNumber'];
$card_type = $_POST['cardType'];

$conn->begin_transaction();

try {
    mysqli_query($conn, "INSERT INTO `payments` (user_id, amount, card_type, card_number) VALUES ($user_id, $payment_amount, '$card_type', '$card_number')");
    $payment_id = $conn->insert_id;

    mysqli_query($conn, "UPDATE `reservation` SET `payment_id` = $payment_id WHERE `id` = $reservation_id");
    
    $conn->commit();
    header("Location: http://localhost/endterm/cabinet.php");
} catch (mysqli_sql_exception $exception) {
    $conn->rollback();
    header("Location: http://localhost/endterm/payment.php");
}
$conn->close();
?>