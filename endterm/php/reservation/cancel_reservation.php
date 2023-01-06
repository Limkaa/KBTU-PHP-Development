<?php
session_start();
require(dirname(dirname(dirname(__FILE__)))."/db.php");

$user_id = $_SESSION['id'];

mysqli_query($conn, "DELETE FROM `reservation` WHERE id IN (SELECT id FROM reservation WHERE user_id=$user_id AND payment_id IS NULL)");
header("Location: http://localhost/endterm/cabinet.php");
die();
?>