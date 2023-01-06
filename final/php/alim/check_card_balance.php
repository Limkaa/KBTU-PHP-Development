<?php
session_start();

require(dirname(dirname(__FILE__))."/db.php");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['from_account']) && isset($_POST['amount'])) {
        $from_account = $_POST['from_account'];
        $amount = $_POST['amount'];
        $balance_query = "SELECT * FROM cards WHERE id = '$from_account' AND balance >= $amount";
        $result = mysqli_query($conn, $balance_query);
        if ($result->num_rows > 0) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }
    die();
}
?>