<?php
session_start();

if(!isset($_SESSION["islogin"]))
{
    echo "<script>window.location='login.php'</script>";
}
 include 'connection.php'
?>