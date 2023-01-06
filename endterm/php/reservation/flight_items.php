<div class="bg-white rounded shadow overflow-hidden mb-6">
    <?php 
        $result->data_seek(0);
        $departure = $result->fetch_assoc();
        $dep_time = new Datetime($departure['departure_time']);
        $result->data_seek($result->num_rows - 1);
        $arrival = $result->fetch_assoc();
        $arr_time = new Datetime($arrival['arrival_time']);
    ?>
    <div class="flex flex-wrap py-4 px-5 bg-blue-500">
        <div class="flex flex-shrink-0 items-center justify-center w-1/6">
            <img src="images/tickets/booking-plane.png" alt="Полупрозрачная иконка самолета" class="max-w-full">
        </div> 
        <div class="flex flex-row flex-grow items-center justify-between w-auto">
            <div class="flex items-top text-white">
                <p class="m-0">
                    <span class="block text-xl font-semibold"><?php echo $departure['cit_dep_name']?></span> 
                    <span class="text-xs text-white text-opacity-75"><?php echo $dep_time->format('d.m.Y')?></span>
                </p> 
                <span class="mx-3 text-xl font-semibold">—</span> 
                <p class="m-0">
                <span class="block text-xl font-semibold"><?php echo $arrival['cit_arr_name']?></span> 
                    <span class="text-xs text-white text-opacity-75"><?php echo $arr_time->format('d.m.Y')?></span>
                </p>
            </div>
        </div>
    </div>
    
    <?php 
    $result->data_seek(0);

    while($row = $result->fetch_assoc()) { 
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
                        <select required data-flight="<?php echo $row['id']?>" name="flightsPlaces[<?php echo $row['id']?>]" class="place-selection border border-solid bg-white rounded border-box focus:outline-none w-full px-2 border-gray-500">
                            <option disabled="disabled" value="" selected data-price="0">Выберите место</option>
                            <?php 
                                $flight_id = $row['id'];
                                $places_query = "SELECT place_row, place_char FROM tickets WHERE flight_id = $flight_id";
                                $reserved_places = mysqli_query($conn, $places_query);

                                $business_rows = 5;
                                $business_columns = 4;

                                $economy_rows = 50;
                                $economy_columns = 6;

                                $chars = 'ABCDEF';

                                $reserved_places_array = array();
                                while($place = $reserved_places->fetch_assoc()) { 
                                    array_push($reserved_places_array, $place['place_row']."-".$place['place_char']);
                                }

                                for ($row_number = 1; $row_number <= $business_rows + $economy_rows; $row_number++) {
                                    for ($col = 0; $col < 6; $col++) {
                                        $price_for_place = 0;
                                        if ($row_number <= $business_rows) {
                                            if ($col < 4) {
                                                $place = $row_number."-".$chars[$col];
                                                if (in_array($place, $reserved_places_array)) { continue; }
                                                $price_for_place = $row['price_business'];
                                                $place_string = $place." (бизнес-класс) - ".$price_for_place." KZT";
                                            } else {
                                                continue;
                                            }
                                        } else {
                                            $place = $row_number."-".$chars[$col];
                                            if (in_array($place, $reserved_places_array)) { continue; }
                                            $price_for_place = $row['price_economy'];
                                            $place_string = $place." (эконом) - ".$price_for_place." KZT";
                                        }
                            ?>
                                <option 
                                value="<?php echo $place?>"
                                data-price="<?php echo $price_for_place;?>"
                                ><?php echo $place_string?></option>
                            <?php } } ?>
                        </select>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>