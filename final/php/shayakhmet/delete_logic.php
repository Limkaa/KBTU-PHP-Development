<?php
require_once "../db.php";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['id'])) {
        $checkID = $_POST['id'];
        $sql = "SELECT id FROM cart_items WHERE id = $checkID";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $deleteID = $row["id"];
            $sql2 = "DELETE FROM cart_items WHERE id = $deleteID";
            $result2 = $conn->query($sql2);
            if ($result2 == TRUE) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        } else {
            echo json_encode(array('result' => false));
        }
        
    }
}
?>