<?php 
header('Access-Control-Allow-Origin: *');

include 'connection.php';


$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$message = $_POST["message"];


$result = mysqli_query($conn,"insert into tbl_feedback(name,contact,email,message) values ('$name','$contact','$email','$message') ") or die(mysqli_error($conn));
if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>