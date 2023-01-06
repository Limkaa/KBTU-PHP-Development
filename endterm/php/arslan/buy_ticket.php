<?php
    session_start();
    if(isset($_POST["id_there"])){
        $_SESSION["flights_to"][0] = $_POST["id_there"];
        if(isset($_POST["id_back"])){
            $_SESSION["flights_from"][0] = $_POST["id_back"];
        }
    }
?>