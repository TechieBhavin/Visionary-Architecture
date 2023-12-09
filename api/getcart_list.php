<?php
include("connection.php");

$userid = $_POST["user_id"];

$data = mysqli_query($conn, "SELECT c.user_id as user_id,c.*,p.*,u.*
FROM tbl_cart AS c
LEFT JOIN tbl_user AS u ON c.user_id = u.user_id
LEFT JOIN tbl_product AS p ON c.pid = p.pid  WHERE c.user_id = '".$userid."';") or die(mysqli_error($conn));

$row = mysqli_num_rows($data);

if ($row >= 1) {


    $responce['status']= 'true';
   while($row = mysqli_fetch_assoc($data))
	{
	$responce['data'][] = $row;
	}
} else
{
     $responce['status']= 'false';
    
}
echo json_encode($responce);

?>

