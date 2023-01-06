<?php 
session_start();

require(dirname(dirname(__FILE__))."/db.php");
$user_id = $_SESSION['user_id'];

$random_issuer_query = "SELECT * FROM card_issuers ORDER BY RAND() LIMIT 1";
$random_issuer = mysqli_query($conn, $random_issuer_query) -> fetch_assoc();
$issuer_id = $random_issuer['id'];
$card_number = $random_issuer['prefix'].rand(100, 999).rand(1000, 9999).rand(1000, 9999).rand(1000, 9999);

$card_create_query = "INSERT INTO cards (user_id, number, type, issuer, balance, is_active) VALUES ('$user_id', '$card_number', 2, '$issuer_id', 0, 1);";
mysqli_query($conn, $card_create_query);
header("Location: http://localhost/final/bank.php");
die();
?>