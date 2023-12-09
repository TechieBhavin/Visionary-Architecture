<?php 
session_start();
// session_destroy();
unset($_SESSION['islogin']);
echo "<script>window.location='login.php'</script>";
?>