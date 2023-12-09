<?php include 'connection.php';?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require 'vendor/PHPMailer/phpmailer/src/SMTP.php';
require 'vendor/PHPMailer/phpmailer/src/Exception.php';
?>

<?php
$email = $_POST["mail"];

$result = mysqli_query($conn, "select * from tbl_user where email = '$email' ") or die(mysqli_error($conn));

$row = mysqli_num_rows($result);
$response = array();
if ($row >= 1) {

    foreach ($result as $row) {
        $pass = $row['password'];
        $email = $row['email'];
        $username = $row['name'];
    }
    $mail = new PHPMailer;
    $mail->isSMTP();
    //$mail->SMTPDebug = 1; # 0 off, 1 client, 2 client y server
    $mail->CharSet  = 'UTF-8';
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->Username = 'bhavinpatel0325@gmail.com';
    $mail->Password = 'vcikvauthaxrvrab';
    // Sender info 
    $mail->setFrom('bhavinpatel0325@gmail.com', 'Admin');
    $mail->addReplyTo('bhavinpatel0325@gmail.com', 'Admin');

    // Add a recipient 
    $mail->addAddress($email);

    // Email subject 
    $mail->Subject = 'Forgot Password';

    // Set email format to HTML 
    $mail->isHTML(true);

    $mail->Body = "<h2> Login Details </h2>
        <p>Dear User,</p>
        <p>Username : $username</p>
        <p>Email : $email</p>
        <p>Password : $pass</p>
        <h2>Thank You</h2>
        ";

    // Send email 

    if (!$mail->send()) {
        $response['status'] = "false";
        $response['message'] = "failed";
        // echo "mail not send";
        // print_r(error_get_last());
    } else {
        $response['status'] = "true";
        $response['message'] = "success";
        // echo "yes";
        // echo "MailSend";
        // echo "<script>window.location='login.php'</script>";
    }
    // echo $name;
} else {
    $response['status'] = "false";
    $response['message'] = "failed";
    
}
echo json_encode($response);

?>