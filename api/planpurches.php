<?php 
include 'connection.php';

$userid = $_POST["userid"];
$plan_id = $_POST["planid"];
$amount = $_POST['amount'];
$ispay = $_POST["ispay"];
$trans_no = $_POST["transno"];
$pay_mode = $_POST["paymode"];
$status = $_POST["status"];

$result = mysqli_query($conn, "INSERT INTO tbl_plan_purchase(user_id,plan_id,amount,ispay,trans_no,pay_mode,status) VALUE ('$userid','$plan_id','$amount','$ispay','$trans_no','$pay_mode','$status')");


$repose = array();

if ($result) {
        // echo "yes";
        $repose['status'] = "true";
} else {
        // echo "no";
        $repose['status'] = "false";
}

echo json_encode($repose);
