<?php
include("connection.php");



$userid = $_POST["user_id"];
$productid = $_POST["product_id"];
$quntity = $_POST["quantity"];
$total = $_POST["total"];
$price = $_POST["price"];


$data = mysqli_query($conn, "INSERT INTO tbl_cart(user_id, pid, qty,total,price) VALUES ('$userid','$productid','$quntity','$total','$price')") or die(mysqli_error($conn));
$responce = array();
if($data){
     $responce['status'] = "true";
     $responce['message'] = "sucess";
}else{
     $responce['status'] = "false";
     $responce['message'] = "failed";
}

// if ($data) {
//     $responce['status']= 'true';
//    while($row = mysqli_fetch_assoc($data))
// 	{
// 	$responce['data'][] = $row;
// 	}
// } else
// {
//      $responce['status']= 'false';
    
// }
echo json_encode($responce);

?>
