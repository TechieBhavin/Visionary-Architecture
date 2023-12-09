<?php include 'connection.php' ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require 'vendor/PHPMailer/phpmailer/src/SMTP.php';
require 'vendor/PHPMailer/phpmailer/src/Exception.php';
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:32:48 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Recover Password | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Forgot Password</h5>
                                        <p>Change Your Password </p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>

                                <?php

                                if (isset($_POST["btnsub"])) {

                                    // echo "hello";
                                    $email = $_POST["mail"];

                                    // echo $email;

                                    $result = mysqli_query($conn, "select * from tbl_admin where email = '$email' ") or die(mysqli_error($conn));

                                    $row = mysqli_num_rows($result);

                                    if ($row >= 1) {

                                        // echo "email";

                                        foreach ($result as $row) {

                                            $pass = $row['password'];
                                            $username = $row['admin_name'];


                                            // echo "<br/>";
                                            // echo $pass;
                                            // echo "<br/>";
                                            // echo $username;
                                            // echo "<br/>";
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
                                        $mail->Password = 'yfolwkxivsxscebt';
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
            <p>Password : $pass</p>
            <h2>Thank You - Team WeCop - To Protect and To Serve</h2>
            ";

                                        // Send email 

                                        if (!$mail->send()) {
                                            echo "mail not send";
                                            print_r(error_get_last());
                                             
                                        } else {
                                            // echo "Mail Send";
                                            echo "<script>window.location='login.php'</script>";
                                        }
                                        
                                        // echo $name;
                                    } else {
                                        echo "Email Id Does not Register";
                                    }
                                }
                          



                                ?>

                                <form method="post" class="form-horizontal">

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" name="btnsub" type="submit">Reset</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:32:48 GMT -->

</html>