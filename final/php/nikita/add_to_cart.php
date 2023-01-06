<?php
session_start();
require_once "../db.php";
 
$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
        
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo json_encode(array('result' => true));
          } else {
            echo json_encode(array('result' => false));
          }
          
          $conn->close();
    }
}
header("Location: http://localhost/final/product.php");

?>