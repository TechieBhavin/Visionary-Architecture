<?php 
include 'connection.php';

$userid = $_POST["userid"];
$productid = $_POST["productid"];
$qty = $_POST['qty'];
$address = $_POST["address"];
$landmark = $_POST["landmark"];
$pincode = $_POST["pincode"];
$status = $_POST["status"];
$city_id = $_POST["city_id"];
$is_pay= $_POST["is_pay"];
$transnumber = $_POST["transnumber"];
$totalpayment = $_POST["totalpayment"];
// pay_mode
$productIdsArray = explode(",", $productid);
$qtyArray = explode(",", $qty);

$result = mysqli_query($conn, "INSERT INTO tbl_order(user_id,address,landmark,pincode,status,city_id,is_pay,transnumber,totalpayment) VALUES ('$userid','$address','$landmark','$pincode','$status','$city_id','$is_pay','$transnumber','$totalpayment')");

// $result = mysqli_query($conn, "INSERT INTO tbl_order(user_id,pid,ispay,address,landmark,pincode,status,city_id,trans_no,total_payment) VALUE ('$userid','$productid','$is_pay','$address','$landmark','$pincode','$status','$city_id','$transnumber','$totalpayment')") or die(mysqli_error($conn));

$orderid = mysqli_insert_id($conn);
echo "orderid : ".$orderid;



// $result = mysqli_query($conn, "INSERT INTO tbl_orders (user_id,address,landmark,pincode,status,city_id,is_pay,transnumber,totalpayment) VALUES ('$userid','$address','$landmark','$pincode','$status','$city_id','$is_pay','$transnumber','$totalpayment')");
// $orderid = mysqli_insert_id($conn);

// foreach ($productIdsArray as $value) {
        for($i= 0; $i< count($productIdsArray); $i++){
        $query01 = mysqli_query($conn, "INSERT INTO tbl_order_products(order_id,pid,qty) VALUES ('$orderid','$productIdsArray[$i]','$qtyArray[$i]')");
        // echo $query01;
}
$cartdata = mysqli_query($conn,"select * from tbl_cart where user_id='$userid'");
//print_r($cartdata);
// while($row=mysqli_fetch_assoc($cartdata))
// {  
//     print_r($row);
//     $pid= $row["productid"];
//     echo $pid;
//     $qty = $row["qty"];
//     $price = $row["price"];
    
//     mysqli_query($conn, "INSERT INTO tbl_order_item(order_id,pid,qty,price) VALUE ('$orderid','$pid','$qty','$price')") or die(mysqli_error($conn));
// }



mysqli_query($conn,"delete from tbl_cart where user_id='$userid'");

mysqli_query($conn, "INSERT INTO tbl_log(order_id,status) VALUES ('$orderid','panding')") or die(mysqli_error($conn));

if ($result) {
        echo "yes";
} 
else { 
        echo "no";
}
