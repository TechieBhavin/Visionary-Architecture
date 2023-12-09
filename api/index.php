<?php 

include 'connection.php';

$email = $_POST["email"];
$pass = $_POST["password"];


$result = mysqli_query($conn, "select * from tbl_user where (email='$email' and password='$pass') and (isverify='yes' and isblock='no')") or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($result);

if($row>=1)
{
    // echo "yes";
    $responce["status"]="true";
    $responce["message"]="login suessfully";
    $responce["data"]=$row;
    // echo "yes";
}
else
{
    $responce["status"]="false";
    $responce["message"]="login not suessfully";
    // echo "no";
    
}
echo json_encode($responce);


?>