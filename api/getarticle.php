<?php
header('Access-Control-Allow-Origin: *');

include 'connection.php';

$responce=array();

$result = mysqli_query($conn,"select * from tbl_articles as a left join tbl_architect as i on i.architect_id=a.architect_id") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $responce[]=$row;
}
echo json_encode($responce);
?>