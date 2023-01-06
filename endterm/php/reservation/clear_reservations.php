<?php
require(dirname(dirname(dirname(__FILE__)))."/db.php");

$min_allowed_time_border = date('Y-m-d H:i:s', time() - 300);
$query = "DELETE FROM reservation WHERE created_at < '$min_allowed_time_border' AND payment_id IS NULL";
mysqli_query($conn, $query);
?>