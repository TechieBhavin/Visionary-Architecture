<?php
include("connection.php");

$responce = array();
$all = array();

$result = mysqli_query($conn, "select * from tbl_architect as a left join tbl_city as c on c.city_id= a.city_id order by a.architect_id desc") or die(mysqli_error($conn));
$row = mysqli_num_rows($result);

    if ($row >= 1) {       
        $responce['status'] = 'true';
        $responce["message"] = "data found";
        while($newrow = mysqli_fetch_assoc($result)){
            $responce["data"][] = $newrow;
        }
    } else {
        $responce['status'] = 'false';
        $responce["message"] = "data not found";
    }
    echo json_encode($responce);
 

?>