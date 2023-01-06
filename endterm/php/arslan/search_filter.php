<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
    require_once dirname(dirname(dirname(__FILE__)))."/db.php";
    $return_array = array();
    if(isset($_POST["action"])){
        //QUERY BACK
        if(isset($_POST["dept_time_back"]) && !empty($_POST["dept_time_back"])){
            $min_price = 1000000000;
            $query_there = "SELECT * FROM flights WHERE departure_city_id = ".$_POST["dept_id"]." 
            AND arrival_city_id = ".$_POST["dest_id"]." 
            AND DATE(departure_time) = '".$_POST["dept_time"]."'";
            if(isset($_POST["airline"])){
                $airline_filter = implode("','", $_POST["airline"]);
                $query_there .= "AND airline_id IN('".$airline_filter."')";
            }

            if(isset($_POST["max_price"]) && isset($_POST["max_price"]) && 
            !empty($_POST["min_price"]) && !empty($_POST["max_price"])){
                $query_there .= "AND price_economy BETWEEN'".$_POST["min_price"]."' AND '".$_POST["max_price"]."'";
            }

            if(isset($_POST["min_time_there_dept"]) && isset($_POST["max_time_there_dept"]) && 
            !empty($_POST["min_time_there_dept"]) && !empty($_POST["max_time_there_dept"])){
                $query_there .= "AND TIME(departure_time) BETWEEN'".$_POST["min_time_there_dept"]."' AND '".$_POST["max_time_there_dept"]."'";
            }
            
            if(isset($_POST["min_time_there_dest"]) && isset($_POST["max_time_there_dest"]) && 
            !empty($_POST["min_time_there_dest"]) && !empty($_POST["max_time_there_dest"])){
                $query_there .= "AND TIME(arrival_time) BETWEEN'".$_POST["min_time_there_dest"]."' AND '".$_POST["max_time_there_dest"]."'";
            }
            $query_there .= "ORDER BY price_economy ASC";
            $result_there = mysqli_query($conn, $query_there);
            $total_row_there = mysqli_num_rows($result_there);
            $output = "";

            //------------------------------------//

            $query_back = "SELECT * FROM flights WHERE departure_city_id = ".$_POST["dest_id"]." 
            AND arrival_city_id = ".$_POST["dept_id"]." 
            AND DATE(departure_time) = '".$_POST["dept_time_back"]."'";

            if(isset($_POST["airline"])){
                $airline_filter = implode("','", $_POST["airline"]);
                $query_back .= "AND airline_id IN('".$airline_filter."')";
            }

            if(isset($_POST["min_time_back_dept"]) && isset($_POST["max_time_back_dept"]) && 
            !empty($_POST["min_time_back_dept"]) && !empty($_POST["max_time_back_dept"])){
                $query_back .= "AND TIME(departure_time) BETWEEN'".$_POST["min_time_back_dept"]."' AND '".$_POST["max_time_back_dept"]."'";
            }
            
            if(isset($_POST["min_time_back_dest"]) && isset($_POST["max_time_back_dest"]) && 
            !empty($_POST["min_time_back_dest"]) && !empty($_POST["max_time_back_dest"])){
                $query_back .= "AND TIME(arrival_time) BETWEEN'".$_POST["min_time_back_dest"]."' AND '".$_POST["max_time_back_dest"]."'";
            }
            $total_row_back = 0;
            if($total_row_there > 0){
                while($row = mysqli_fetch_array($result_there)){
                    $query_temp_back = $query_back;
                    if(isset($_POST["max_price"]) && isset($_POST["max_price"]) && 
                    !empty($_POST["min_price"]) && !empty($_POST["max_price"])){
                        $query_temp_back .= "AND price_economy BETWEEN'".$row['price_economy']-$_POST["min_price"]."' AND '".$_POST["max_price"] - $row['price_economy']."'";
                    }
                    $query_temp_back .= " ORDER BY price_economy ASC";
                    $result_back = mysqli_query($conn, $query_temp_back);
                    $row_back = mysqli_num_rows($result_back);
                    $total_row_back += $row_back;
                    if($row_back > 0){
                        while($row_back = mysqli_fetch_array($result_back)){
                            $query_airline_there = "SELECT name FROM airlines WHERE id = ".$row['airline_id']."";
                            $query_airline_back = "SELECT name FROM airlines WHERE id = ".$row_back['airline_id']."";
                            $result_airline_there = mysqli_query($conn, $query_airline_there);
                            $result_airline_back = mysqli_query($conn, $query_airline_back);
                            $airline_name_there = mysqli_fetch_array($result_airline_there)["name"];
                            $airline_name_back = mysqli_fetch_array($result_airline_back)["name"];

                            $time_there = strtotime($row["arrival_time"])-strtotime($row["departure_time"]);
                            $time_back = strtotime($row_back["arrival_time"])-strtotime($row_back["departure_time"]);
                            //TIME INTERVAL FOR FLIGHT
                            $days_there = floor(($time_there)/(60*60*24));
                            $hours_there = floor(($time_there - $days_there*60*60*24)/(60*60));
                            $minutes_there =  floor(($time_there - $hours_there*60*60 - $days_there*60*60*24)/(60));

                            $days_back = floor(($time_back)/(60*60*24));
                            $hours_back = floor(($time_back - $days_back*60*60*24)/(60*60));
                            $minutes_back =  floor(($time_back - $hours_back*60*60 - $days_back*60*60*24)/(60));

                            $output .= "
                            <div class='ticket-card'>
                                <div class='ticket-card-airline'>
                                    <div class='airline-there'>".$airline_name_there."</div>
                                    <div class='airline-there'>".$airline_name_back."</div>
                                </div>
                                <div class='ticket-card-transit'>
                                    <p>прямой</p>
                                </div>
                                <div class='ticket-card-time-interval'>
                                    <p><span class='ticket-time-interval-text-bold'>".date("H:i", strtotime($row["departure_time"]))."</span><span class='ticket-time-interval-text'> - ".date("H:i", strtotime($row["arrival_time"]))."</span></p>
                                    <p><span class='ticket-time-interval-text-bold'>".date("H:i", strtotime($row_back["departure_time"]))."</span><span class='ticket-time-interval-text'> - ".date("H:i", strtotime($row_back["arrival_time"]))."</span></p>
                                </div>
                                <div class='ticket-card-time-interval'>
                                    <p>".$hours_there." ч ".$minutes_there." м</p>
                                    <p>".$hours_back." ч ".$minutes_back." м</p>
                                </div>
                                <div class='ticket-card-buy-btn-block'>
                                    <button class='ticket-card-buy-btn' onclick='buyTicketTwoWay(".$row["id"].",".$row_back["id"].")'>Купить за ".$row["price_economy"]+$row_back["price_economy"]." ₸</button>
                                </div>
                            </div>";
                            $min_price = min($min_price, $row["price_economy"]+$row_back["price_economy"]);
                        }
                    }
                }
                if($total_row_back == 0){
                    $output = ' 
                    <div id="Airplane" class="search-tabcontent found">
                        <div class="search-not-found">
                            <h1 class="search-not-found-header">ой...</h1>
                            <p class="search-not-found-text">По вашему запросу не найдено ни одного билета.<br>Попробуйте изменить параметры поиска или фильтров</p>
                            <img src="images/arslan/search/airplane--gray.svg" alt="" class="search-not-found-img">
                        </div>           
                    </div>';
                }
            }
            else{
                $output = ' 
                <div id="Airplane" class="search-tabcontent found">
                    <div class="search-not-found">
                        <h1 class="search-not-found-header">ой...</h1>
                        <p class="search-not-found-text">По вашему запросу не найдено ни одного билета.<br>Попробуйте изменить параметры поиска или фильтров</p>
                        <img src="images/arslan/search/airplane--gray.svg" alt="" class="search-not-found-img">
                    </div>           
                </div>';
            }
            if($min_price == 1000000000) $min_price = 0;
            $return_array = array("output" => $output,
                            "flight_num" => $total_row_back,
                            "min_price" => $min_price);
            echo json_encode($return_array);
        }

        else{
            $min_price = 1000000000;
            $query_there = "SELECT * FROM flights WHERE departure_city_id = ".$_POST["dept_id"]." 
            AND arrival_city_id = ".$_POST["dest_id"]." 
            AND DATE(departure_time) = '".$_POST["dept_time"]."'";
            if(isset($_POST["airline"])){
                $airline_filter = implode("','", $_POST["airline"]);
                $query_there .= "AND airline_id IN('".$airline_filter."')";
            }

            if(isset($_POST["max_price"]) && isset($_POST["max_price"]) && 
            !empty($_POST["min_price"]) && !empty($_POST["max_price"])){
                $query_there .= "AND price_economy BETWEEN'".$_POST["min_price"]."' AND '".$_POST["max_price"]."'";
            }

            if(isset($_POST["min_time_there_dept"]) && isset($_POST["max_time_there_dept"]) && 
            !empty($_POST["min_time_there_dept"]) && !empty($_POST["max_time_there_dept"])){
                $query_there .= "AND TIME(departure_time) BETWEEN'".$_POST["min_time_there_dept"]."' AND '".$_POST["max_time_there_dept"]."'";
            }
            
            if(isset($_POST["min_time_there_dest"]) && isset($_POST["max_time_there_dest"]) && 
            !empty($_POST["min_time_there_dest"]) && !empty($_POST["max_time_there_dest"])){
                $query_there .= "AND TIME(arrival_time) BETWEEN'".$_POST["min_time_there_dest"]."' AND '".$_POST["max_time_there_dest"]."'";
            }

            $result_there = mysqli_query($conn, $query_there);
            $total_row_there = mysqli_num_rows($result_there);
            $output = "";

            if($total_row_there > 0){
                while($row = mysqli_fetch_array($result_there)) {
                    $query_airline_there = "SELECT name FROM airlines WHERE id = ".$row['airline_id']."";
                    $result_airline_there = mysqli_query($conn, $query_airline_there);
                    $airline_name_there = mysqli_fetch_array($result_airline_there)["name"];

                    $time_there = strtotime($row["arrival_time"])-strtotime($row["departure_time"]);
                    //TIME INTERVAL FOR FLIGHT
                    $days_there = floor(($time_there)/(60*60*24));
                    $hours_there = floor(($time_there - $days_there*60*60*24)/(60*60));
                    $minutes_there =  floor(($time_there - $hours_there*60*60 - $days_there*60*60*24)/(60));
                    
                    $output .= "
                    <div class='ticket-card'>
                        <div class='ticket-card-airline'>
                            <div class='airline-there'>".$airline_name_there."</div>
                        </div>
                        <div class='ticket-card-transit'>
                            <p>прямой</p>
                        </div>
                        <div class='ticket-card-time-interval'>
                            <p><span class='ticket-time-interval-text-bold'>".date("H:i", strtotime($row["departure_time"]))."</span><span class='ticket-time-interval-text'> - ".date("H:i", strtotime($row["arrival_time"]))."</span></p>
                        </div>
                        <div class='ticket-card-time-interval'>
                            <p>".$hours_there." ч ".$minutes_there." м</p>
                        </div>
                        <div class='ticket-card-buy-btn-block'>
                            <button class='ticket-card-buy-btn' onclick='buyTicketOneWay(".$row["id"].")'>Купить за ".$row["price_economy"]." ₸</button>
                        </div>
                    </div>";
                    $min_price = min($min_price, $row["price_economy"]);
                }
            }
            else{
                $output = ' 
                <div id="Airplane" class="search-tabcontent found">
                    <div class="search-not-found">
                        <h1 class="search-not-found-header">ой...</h1>
                        <p class="search-not-found-text">По вашему запросу не найдено ни одного билета.<br>Попробуйте изменить параметры поиска или фильтров</p>
                        <img src="images/arslan/search/airplane--gray.svg" alt="" class="search-not-found-img">
                    </div>           
                </div>';
            }
            if($min_price == 1000000000) $min_price = 0;
            $return_array = array("output" => $output,
                            "flight_num" => $total_row_there,
                            "min_price" => $min_price);
            echo json_encode($return_array);
        }
    }


?>