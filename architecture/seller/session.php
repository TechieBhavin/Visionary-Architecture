<?php
session_start();

if(!isset($_SESSION["isseller"]))
{
    echo "<script>window.location='sellerlogin.php'</script>";
}
 include 'connection.php'
?>