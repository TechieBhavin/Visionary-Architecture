<?php 
session_start();
// session_destroy();
unset($_SESSION['isarchitect']);
echo "<script>window.location='architectlogin.php'</script>";
?>