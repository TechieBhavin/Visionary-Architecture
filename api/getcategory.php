<?php
header('Access-Control-Allow-Origin: *');

include 'connection.php';

$resonce=array();

$result = mysqli_query($conn,"select * from tbl_category") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $resonce[]=$row;
}
echo json_encode($resonce);
?>