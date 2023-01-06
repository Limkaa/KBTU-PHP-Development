<?php
    session_start();
    if(isset($_POST["id_there"])){
        echo $_POST["id_there"];
        $_SESSION["flights_to"] = array($_POST["id_there"]);
        if (isset($_POST["id_back"])) {
            $_SESSION["flights_from"][0] = $_POST["id_back"];
        } else {
            $_SESSION["flights_from"] = array();
        }
    }
?>