<?php
    error_reporting(-1); // reports all errors
    ini_set("display_errors", "1"); // shows all errors
    ini_set("log_errors", 1);
    ini_set("error_log", "/tmp/php-error.log");

    function flight_paths($graph, $start, $end) {
        $queue = new SplQueue();
        # Enqueue the path
        $queue->enqueue([$start]);
        $visited = [$start];
        while ($queue->count() > 0) {
            $path = $queue->dequeue();
            # Get the last node on the path
            # so we can check if we're at the end
            $node = $path[sizeof($path) - 1];
            
            if ($node === $end) {
                return $path;
            }
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
                    # Build new path appending the neighbour then and enqueue it
                    $new_path = $path;
                    $new_path[] = $neighbour;
                    $queue->enqueue($new_path);
                }
            };
        }
        return false;
    }

    $tree = array();
    $flight_path = array();

    $db = include("config.php");
    $flight_query = "SELECT * FROM flights WHERE departure_city_id = 9 OR arrival_city_id = 3";
    $flight_result = mysqli_query($db, $flight_query);
    while($myrow = mysqli_fetch_array($flight_result)){
        $tree[] = array(
            "dept" => $myrow["departure_city_id"],
            "dest" => $myrow["arrival_city_id"],
            "cost" => $myrow["price_economy"],
            "stt" => $myrow["departure_time"],
            "endt" => $myrow["arrival_time"]
        );
    }

    $graph = [
      'A' => ['B', 'C'],
      'B' => ['A', 'D'],
      'D' => ['B'],
      'C' => ['A',],
    ];

    print_r(flight_paths($graph, 'A', 'D'));

    // print_r($tree);
?>