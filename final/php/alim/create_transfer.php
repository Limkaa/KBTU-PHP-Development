<?php 
session_start();

require(dirname(dirname(__FILE__))."/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['from_account']) && isset($_POST['to_card_id'])
    && isset($_POST['amount']) && isset($_POST['to_card_number']) 
    && isset($_POST['fee'])) {
        
        $from_account = $_POST['from_account'];
        $to_card_id = $_POST['to_card_id'];
        $amount = $_POST['amount'];
        $to_card_number = "NULL";
        if ($to_card_id == "-1") {
            $to_card_id = "NULL";
            $to_card_number = str_replace(' ', '', $_POST['to_card_number']);
        }
        $fee = $_POST['fee'];
        
        $conn->begin_transaction();

        try {
            $transfer_create_query = "INSERT INTO operations (from_card, to_card, unknown_card, amount, type, fee) VALUES ('$from_account', $to_card_id, $to_card_number, $amount, 3, $fee);";
            mysqli_query($conn, $transfer_create_query);

            $take_from_balance_query = "UPDATE cards SET balance = (balance - $amount - $fee) WHERE id = $from_account";
            $add_to_balance_query = "UPDATE cards SET balance = (balance + $amount) WHERE id = $to_card_id";

            mysqli_query($conn, $take_from_balance_query);
            mysqli_query($conn, $add_to_balance_query);
            $conn->commit();
            header("Location: http://localhost/final/bank.php?tab=transfers");
            die();
        } catch (mysqli_sql_exception $exception) {
            $conn->rollback();
            header("Location: http://localhost/final/bank.php");
        }
        $conn->close();
    }
}
?>