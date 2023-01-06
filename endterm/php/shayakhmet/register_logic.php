<?php
require_once dirname(dirname(dirname(__FILE__)))."/db.php";
 
$email = $password = "";
$email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $sql = "SELECT id FROM users WHERE email = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        
        $param_email = trim($_POST["eml"]);
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                echo json_encode(array('result' => false));
                die();
            }
        } else{
            echo json_encode(array('result' => false));
            die();
        }

        mysqli_stmt_close($stmt);
    }
    
    $password = trim($_POST["pwd"]);
            
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
        
        $param_email = trim($_POST["eml"]);
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        
        if(mysqli_stmt_execute($stmt)){
            echo json_encode(array('result' => true));
        } else{
            echo json_encode(array('result' => false));
        }

        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>