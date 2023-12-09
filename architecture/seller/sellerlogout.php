<?php 
session_start();
// session_destroy();
unset($_SESSION['isseller']);
echo "<script>window.location='sellerlogin.php'</script>";
?>