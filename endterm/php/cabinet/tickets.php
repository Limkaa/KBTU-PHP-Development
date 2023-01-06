<div class="bg-white rounded shadow overflow-hidden mb-6">
    <div class="flex flex-wrap py-4 px-5 bg-blue-500">
        <div class="flex flex-shrink-0 items-center justify-center w-1/6">
            <img src="images/tickets/booking-plane.png" alt="Полупрозрачная иконка самолета" class="max-w-full">
        </div> 
        <div class="flex flex-row flex-grow items-center w-auto">
            <div class="flex items-top text-white">
                <p class="m-0 text-lg font-semibold">Оплаченные билеты</p>
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
            $place_string = $place." (бизнес-класс)";
        } else {
            $place_string = $place." (эконом)";
        }
?>

    <div class="bg-white rounded shadow overflow-hidden" id="ticket-<?php echo $row['id']?>">
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
                <div class="flex flex-col items-center lg:w-40 mr-5">
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
                <div class="flex flex-col justify-center flex-wrap mt-0 lg:w-24 ml-1">
                    <div class="text-xs"> 
                        Рейс 
                        <div class="font-bold"><?php echo $row['code']?></div>
                    </div>
                </div>
                <div class="flex flex-col justify-center flex-wrap mt-0 w-32 ml-1">
                    <div class="text-xs"> 
                        Место 
                        <div class="font-bold"><?php echo $place_string?></div>
                    </div>
                </div>  
                <?php 
                    $time_before_departure = ($datetime_from->getTimestamp() - (new Datetime())->getTimestamp()) / 3600;
                    if ($time_before_departure > 3) {
                ?>
                <div class='ticket_body_button_wrapper ml-4'>
                    <button class='deleteButton' value="<?php echo $row['id']?>">Отменить</button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>