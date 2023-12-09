<?php
header('Access-Control-Allow-Origin: *');

include 'connection.php';

$responce=array();

$result = mysqli_query($conn,"select * from tbl_user") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $responce[]=$row;
}
echo json_encode($responce);
?>

