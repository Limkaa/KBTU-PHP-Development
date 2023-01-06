<?php
    if(isset($_POST["query"])){
        require_once dirname(dirname(dirname(__FILE__)))."/db.php";
        // $cond = preg_replace('/[^А-Яа-я0-9\- ]/', '', $_GET["query"]);
        $data = array();

        $query = "SELECT name,code,id FROM cities WHERE name LIKE '".$_POST["query"]."%' ORDER BY id DESC LIMIT 6";
        $result = mysqli_query($conn, $query);
    
        while($myrow = mysqli_fetch_array($result)){

            $data[] = array(
                'name' => $myrow["name"],
                'code' => $myrow["code"],
                "id" => $myrow["id"]
            );
        }
        echo json_encode($data);
    }
?>