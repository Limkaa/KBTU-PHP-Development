<?php 
function cardMasking($number, $maskingCharacter = '*') {
    return substr($number, 0, 4) . str_repeat($maskingCharacter, strlen($number) - 8) . substr($number, -4);
}
?>