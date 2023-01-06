<?php
session_start();

$user_id = $_SESSION['id'];

require(dirname(dirname(dirname(__FILE__)))."/db.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!isset($_POST['firstName']) ||
    !isset($_POST['lastName']) ||
    !isset($_POST['gender']) ||
    !isset($_POST['dateOfBirth']) ||
    !isset($_POST['documentNumber']) ||    
    !isset($_POST['phone']) ||
    !isset($_POST['email']) ||
    !isset($_POST['flightsPlaces'])) {
        header("Location: http://localhost/endterm/reservation.php");
        die();
    }

$ticket_name = $_POST['firstName'];
$ticket_surname = $_POST['lastName'];
$ticket_gender = $_POST['gender'];
$ticket_dateOfBirth = $_POST['dateOfBirth'];
$ticket_citizenship = $_POST['citizenship'];
$ticket_document = $_POST['documentNumber'];
$reservation_phone = $_POST['phone'];
$reservation_email = $_POST['email'];

$conn->begin_transaction();

try {
    mysqli_query($conn, "INSERT INTO `reservation` (phone, email, user_id) VALUES ('$reservation_phone', '$reservation_email', $user_id)");
    $reservation_id = $conn->insert_id;
    $_SESSION['reservation_id'] = $reservation_id;

    foreach ($_POST['flightsPlaces'] as $flightId=>$place) {
        $place_info = explode('-', $place);
        mysqli_query($conn, "INSERT INTO `tickets` (flight_id, reservation_id, name, surname, gender, birth_date, doc_number, place_row, place_char, is_active) VALUES ($flightId, $reservation_id, '$ticket_name', '$ticket_surname', '$ticket_gender', '$ticket_dateOfBirth', '$ticket_document', $place_info[0], '$place_info[1]', 1)");
    }

    $conn->commit();
    header("Location: http://localhost/endterm/payment.php");
} catch (mysqli_sql_exception $exception) {
    $conn->rollback();
    header("Location: http://localhost/endterm/reservation.php");
}
$conn->close();
?>