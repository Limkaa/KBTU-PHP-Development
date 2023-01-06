<?php
$reservations->data_seek(0);
$reservation = $reservations->fetch_assoc();
$reservation_id = $reservation['id'];
$reservation_phone = $reservation['phone'];
$reservation_email = $reservation['email'];

$reservation_expiration_time = (new DateTime($reservation['created_at']))->add(new DateInterval('PT5M'));
$reservation_time_delta = $reservation_expiration_time->getTimestamp() - time();

$flights_of_reservation = "SELECT f.*,
    fl.code AS code, 
    fl.departure_time AS departure_time, 
    fl.arrival_time AS arrival_time, 
    fl.price_economy AS price_economy, 
    fl.price_business AS price_business, 
    al.id AS airline_id,
    al.name AS airline_name,
    al.image AS airline_image,
    cit_dep.code AS cit_dep_code,
    cit_dep.name AS cit_dep_name,
    cit_arr.code AS cit_arr_code,
    cit_arr.name AS cit_arr_name
    FROM `tickets` AS f
    LEFT JOIN flights AS fl
    ON f.flight_id = fl.id
    LEFT JOIN airlines AS al 
    ON fl.airline_id = al.id
    LEFT JOIN cities AS cit_dep 
    ON fl.departure_city_id = cit_dep.id
    LEFT JOIN cities AS cit_arr 
    ON fl.arrival_city_id = cit_arr.id
    WHERE f.reservation_id = $reservation_id;
";

$total_price = 0;

$tickets = mysqli_query($conn, $flights_of_reservation);
if ($tickets->num_rows > 0) {
    $tickets->data_seek(0);
    $ticket = $tickets->fetch_assoc();
    $ticket_name = $ticket['name'];
    $ticket_surname = $ticket['surname'];
    $ticket_gender = $ticket['gender'];
    $ticket_dateOfBirth = $ticket['birth_date'];
    $ticket_document = $ticket['doc_number'];
?>
<div class="space-y-5">
    <div class="bg-white rounded shadow overflow-hidden mb-6">
        <div class="flex flex-wrap py-4 px-5 bg-blue-500">
            <div class="flex flex-shrink-0 items-center justify-center w-1/6">
                <img src="images/tickets/booking-plane.png" alt="Полупрозрачная иконка самолета" class="max-w-full">
            </div> 
            <div class="flex flex-row flex-grow items-center justify-between w-auto">
                <div class="flex items-top text-white">
                    <p class="m-0 text-lg font-semibold">Забронированные билеты</p>
                </div>
                <div class="flex items-center text-white">
                    <p class="m-0 text-2xs">Авто-отмена брони через <span id="reserve-timer" data-seconds="<?php echo $reservation_time_delta;?>"></span></p>
                    <a href="php/reservation/cancel_reservation.php" class="primary_button ml-4" style="background-color: #fe9922;">Отменить сейчас</a>
                </div>
            </div>
        </div>
    <?php 
        $tickets->data_seek(0);
        while($row = $tickets->fetch_assoc()) { 

            $datetime_from = new DateTime($row['departure_time']);
            $datetime_to = new DateTime($row['arrival_time']);

            $duration = $datetime_to->getTimestamp() - $datetime_from->getTimestamp();
            $hours = floor($duration/3600);
            $remainder = ($duration % 3600);
            $minutes = floor($remainder / 60);

            if(strlen($hours) == 1) {
                $hours = "0".$hours;
            }

            if(strlen($minutes) == 1) {
                $minutes = "0".$minutes;
            }
            $duration_formatted = $hours.":".$minutes;

            $business_rows = 5;
            $place = $row['place_row']."-".$row['place_char'];

            if ($row_number <= $business_rows) {
                $price = $row['price_business'];
                $total_price += $price;
                $place_string = $place." (бизнес-класс) - ".$price." KZT";
            } else {
                $price = $row['price_economy'];
                $total_price += $price;
                $place_string = $place." (эконом) - ".$price." KZT";
            }
    ?>

        <div class="bg-white rounded shadow overflow-hidden">
            <div class="relative flex items-center flex-row p-4 px-5">
                <div class="flex items-center justify-center w-1/6">
                    <div class="flex flex-col justify-center items-center flex-shrink-0">
                        <img src="images/airlines/<?php echo $row['airline_image']?>" alt="Лого Air Astana" width="112px" class="mr-6">
                        <p class="m-0 text-xs"><?php echo $row['airline_name']?></p>
                    </div>
                    <img src="images/airlines/<?php echo $row['airline_image']?>" alt="Лого Air Astana" class="absolute top-0 right-0 w-8 mt-4 mr-4 hidden">
                </div>
                <div class="flex flex-row items-center justify-between w-2/3 ml-4">
                    <div class="w-32">
                        <p class="m-0 text-2xl"><?php echo $datetime_from->format('H:i')?></p>
                        <p class="m-0 text-xs"><?php echo $datetime_from->format('d.m.Y')?></p>
                        <p class="m-0 text-xs">
                            <strong><?php echo $row['cit_dep_name']?></strong>
                        </p>
                    </div>
                    <div class="flex flex-col items-center w-1/3 mr-5">
                        <span class="mb-1 text-xs text-gray-500"><?php echo $duration_formatted?></span>
                        <div class="relative w-32 h-px bg-gray-500">
                            <span class="flight-path-circle left-0"></span>
                            <span class="flight-path-circle right-0"></span>
                        </div>
                    </div>
                    <div class="w-32 mt-0 ml-4">
                        <p class="m-0 text-2xl"><?php echo $datetime_to->format('H:i')?></p>
                        <p class="m-0 text-xs"><?php echo $datetime_to->format('d.m.Y')?></p>
                        <p class="m-0 text-xs">
                            <strong><?php echo $row['cit_arr_name']?></strong>
                        </p>
                    </div>
                    <div class="flex flex-col justify-center flex-wrap mt-0 lg:w-32 ml-4">
                        <div class="text-xs"> 
                            Рейс 
                            <div class="font-bold"><?php echo $row['code']?></div>
                        </div>
                    </div>
                </div>
                <div class="labeled-input w-full lg:w-1/3 mt-3 outline-none ml-4">
                    <div tabindex="0">
                        <label tabindex="10" class="flex h-10">
                            <span class="labeled-input__label">Место</span>
                            <input required disabled type="text" value="<?php echo $place_string?>" class="border border-solid bg-white rounded border-box focus:outline-none w-full px-2 border-gray-500">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php } ?>