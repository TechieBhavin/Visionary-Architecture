<?php
header('Access-Control-Allow-Origin: *');

include 'connection.php';

$responce=array();

$id = $_POST["id"];

$result = mysqli_query($conn,"select * from tbl_offers where oid='$id'") or die(mysqli_errno($conn));

while($row = mysqli_fetch_assoc($result))
{
    $responce=$row;
}
echo json_encode($responce);
?>