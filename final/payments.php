<?php
session_start();
$categoryID = isset($_GET["cid"]) ? $_GET["cid"] : '2'; // we set the default

$allowed = ['2','4','5','6']; // list of allowed IDs

$checkAllowed = array_search($categoryID, $allowed, true); // see if we have such an ID
if ($checkAllowed === false) { 
    header("location: payments.php");
    exit;
}

function createCategory($id, $name, $image, $payable = [41,42,43,44,51,52,53,61,62,63]) {
    echo '<div class="category">
        <img src="' . $image . '">
        <p>' . $name . '</p>';
    $checkPayable = array_search($id, $payable, true);
    if ($checkPayable === false) { 
        echo '<a href="payments.php?cid=' . $id . '"><span></span></a>';
    } else {
        echo '<a href="payment_form.php?cid=' . $id . '"><span></span></a>';
    }
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="ru-KZ">
    <head>
        <title>Платежи</title>
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="styles/aizar/header.css">
        <link rel="stylesheet" href="styles/aizar/styles.css">
        <link rel="stylesheet" type="text/css" href="./styles/shayakhmet/payments.css">
    </head>
    <body>
        <?php include("php/aizar/jusan_header.php") ?>

        <div class="main">
            <div class="main_inside_1">
                <div class="main_inside_2">
                    <div class="main_content">
                        <?php 

                            require_once "php/db.php";

                            $sql = "SELECT id, name, icon_path FROM payment_categories WHERE parent_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $categoryID);
                            $stmt->execute();
                            // $result = $conn->query($sql);
                            $result = $stmt->get_result();
                            foreach($result as $key => $row) {
                                createCategory($row['id'], $row['name'], $row['icon_path']);
                            }
                        ?>
                        <div class="category category-other">
                            <img src="images/shayakhmet/next.png">
                            <p>Все платежи</p>
                            <a href="payments.php"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
