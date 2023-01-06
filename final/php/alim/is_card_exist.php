<?php
session_start();

require(dirname(dirname(__FILE__))."/db.php");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['card_number'])) {
        $checkNumber = $_POST['card_number'];
        $sql = "SELECT id FROM cards WHERE number = '$checkNumber'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $card = $result->fetch_assoc();
            echo json_encode(array('result' => true, 'card_id' => $card['id']));
        } else {
            echo json_encode(array('result' => false));
        }
    }
}
?>