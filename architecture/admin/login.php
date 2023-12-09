<?php session_start(); ?>
<?php include 'connection.php' ?>


<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>Admin Login</title>
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
    
    <style>
        .input-group .btn{
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 0;
        }

        .input-group input.form-control{
            width: 100%;
        }
    </style>

    

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
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Admin.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?php

                                if (isset($_POST["btnsubmit"])) {
                                    // echo "inserted";
                                    $username = $_POST["username"];
                                    $password = $_POST["pwd"];

                                    // echo $username;
                                    // echo "<br/>";
                                    // echo $password;

                                    $result = mysqli_query($conn, "select * from tbl_admin where email='$username' and password='$password'") or die(mysqli_error($conn));


                                    $row = mysqli_num_rows($result);

                                    if ($row == 1) {
                                        // echo "login";
                                        $_SESSION["islogin"] = "true";

                                        foreach ($result as $row) {

                                            $_SESSION["adminid"] = $row["admin_id"];
                                            $_SESSION["adminname"] = $row["admin_name"];
                                        }
                                        echo "<script>window.location='dashboard.php'</script>";
                                    } else {
                                        ?>
                                                <div class="alert alert-warning mb-0" role="alert">
                                                    Invalid E-mail and Password!
                                                </div>
                                            <?php
                                    }
                                }

                                ?>
                                <form id="frm" class="form-horizontal" method="POST">

                                    <div class="mb-3"><br>
                                        <label for="username" class="form-label">E-mail</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">


                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <a href="Forgotpw.php" class="form-label">Forgot Password?</a>

                                    </div>

                                   
                                    <div class="mt-3 d-grid">
                                        <button id="btnsubmit" name="btnsubmit" class="btn btn-primary waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>

                                    
                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    username: {
                        required: true
                    },
                    pwd: {
                        required: true,

                    }
                },

                messages: {

                    username: {
                        required: "please enter your username"
                    },
                    pwd: {
                        required: "please enter your password",


                    }

                }

            });


        });
    </script>


</body>


</html>