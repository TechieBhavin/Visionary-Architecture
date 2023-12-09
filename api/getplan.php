<?php
header('Access-Control-Allow-Origin: *');

include 'connection.php';

$responce=array();

$result = mysqli_query($conn,"select p.*,a.name from tbl_plan as p left join tbl_architect as a on a.architect_id=p.architect_id") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $responce[]=$row;
}
echo json_encode($responce);
?>