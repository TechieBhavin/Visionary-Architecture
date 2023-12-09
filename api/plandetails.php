<?php


include 'connection.php';

$responce=array();

$id = $_POST["id"];

$result = mysqli_query($conn,"select * from tbl_plan as p left join tbl_architect as a on a.plan_id=p.plan_id where plan_id='$id'") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $responce=$row;
}
echo json_encode($responce);
?>