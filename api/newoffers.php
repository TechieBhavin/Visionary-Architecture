<?php
include("connection.php");

$responce = array();
$all = array();

$price = $_POST["price"];

$result = mysqli_query($conn, "SELECT *
FROM offers WHERE min_purchase_amount >= $price");

// WHERE start_date <= CURRENT_DATE() AND end_date>= CURRENT_DATE();
// while($row = mysqli_fetch_assoc($result))
// {
//     // echo "yes";
//         // $responce[] = $row;
//     $responce['offerData'][] = $row;
// }
$row = mysqli_num_rows($result);
if ($row >= 1) {


    $responce['status'] = 'true';
    $response["message"] = "offer found";
    while ($row = mysqli_fetch_assoc($result)) {
        $responce['offerdata'][] = $row;
    }
} else {
    $responce['status'] = 'false';
    $response["message"] = "offer not found";
}
echo json_encode($responce);
