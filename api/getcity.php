<?php

include 'connection.php';

$responce = array();



$result1 = mysqli_query($conn,"SELECT * FROM tbl_city ");
while($row1 = mysqli_fetch_assoc($result1))
{
$responce['cityData'][] = $row1;
}

// $result2 = mysqli_query($conn,"SELECT * FROM `tbl_user`");
// while($row2 = mysqli_fetch_assoc($result2))
// {
// $responce['userData'][] = $row2;
// }
echo json_encode($responce);

?>