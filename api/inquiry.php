<?php 
header('Access-Control-Allow-Origin: *');

include 'connection.php';
 
$name = $_POST["name"];
$aid = $_POST["aid"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
// $date = $_POST["inq_date_time"];


$result = mysqli_query($conn,"insert into tbl_inq(architect_id,name,contact,email,subject,message) values ('$aid','$name','$contact','$email','$subject','$message') ") or die(mysqli_error($conn));


if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>