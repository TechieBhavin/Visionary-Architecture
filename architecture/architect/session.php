<?php
session_start();

if(!isset($_SESSION["isarchitect"]))
{
    echo "<script>window.location='architectlogin.php'</script>";
}
 include 'connection.php'
?>