<?php 
header('Access-Control-Allow-Origin: *');

include 'connection.php';


$name = $_POST["name"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$pwd = $_POST["password"];


$result = mysqli_query($conn,"insert into tbl_user(name,contact,email,password) values ('$name','$contact','$email','$pwd') ") or die(mysqli_error($conn));
if($result)
{
    echo "yes";
}
else
{
    echo "no";
}
?>