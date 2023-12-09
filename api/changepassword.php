<?php 

include 'connection.php';

$oldpw = $_POST["oldpw"];
$newpw = $_POST["newpw"];
// $confirmpw = $_POST["confirmpw"];

$id = $_POST["userid"];

// echo $id;
$result = mysqli_query($conn,"select * from tbl_user where user_id= '$id' AND password='$oldpw'") or die (mysqli_error($conn));


$row = mysqli_num_rows($result);

// echo $row;

if($row==1)
{
    
    $result = mysqli_query($conn,"update tbl_user set password='$newpw' where user_id='$id' ") or die (mysqli_error($conn));

    if($result == true)
    {
        echo "yes";
        // echo "<script> window.location = 'logout.php ' </script>";
    }
    else
    {
        echo "no";
    }

    
    
}
else
{
    echo "Oldpassword Invalid!";
    
}

?>