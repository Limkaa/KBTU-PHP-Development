<?php 
    session_start();
    $_SESSION['flights_to'] = array(3994, 4629);
    $_SESSION['flights_from'] = array(3890, 3138, 3705);
    header('Location: reservation.php');
?>