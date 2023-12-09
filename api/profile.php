<?php 

include 'connection.php';

$userid = $_POST["userid"];
$username = $_POST["username"];
$contact = $_POST["contact"];
$email = $_POST["email"];


$result = mysqli_query($conn, "update tbl_user set name='$username',contact='$contact',email='$email' where user_id='$userid'") or die(mysqli_errno($conn));

if ($result == true) {
    echo "update";

    // echo "<script>window.location='login.php'</script>";
} else {
    echo "error";
}

?>