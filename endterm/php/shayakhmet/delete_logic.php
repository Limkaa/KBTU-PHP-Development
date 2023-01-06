<?php
require_once dirname(dirname(dirname(__FILE__)))."/db.php";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['id'])) {
        $checkID = $_POST['id'];
        $sql = "SELECT t.id FROM tickets t LEFT JOIN flights f ON t.flight_id = f.id WHERE t.id = $checkID AND TIMESTAMPDIFF(HOUR, NOW(), f.departure_time) >= 3";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $deleteID = $row["id"];
            $sql2 = "DELETE FROM tickets WHERE id = $deleteID";
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