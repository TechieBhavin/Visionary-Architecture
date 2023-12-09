<?php session_start(); ?>
<?php include 'connection.php' ?>


<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>Change Password</title>
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
                                        
                                    <h4 class="text-primary">Change Password !</h4>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png"  alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo-light.svg" alt="" class="rounded-circle"
                                                height="34">
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

                                    if(isset($_POST["btnsubmit"]))
                                    {
                                       

                                        $oldpw = $_POST["oldpw"];
                                        $newpw = $_POST["newpw"];
                                        $confirmpw = $_POST["confirmpw"];

                                        $id = $_SESSION["adminid"];
                                        echo $id;

                                        $result = mysqli_query($conn,"select * from tbl_admin where admin_id= '$id' AND password='$oldpw'") or die (mysqli_error($conn));


                                        $row = mysqli_num_rows($result);

                                        if($row==1)
                                        {
                                            
                                            $result = mysqli_query($conn,"update tbl_admin set password='$newpw' where  admin_id='$id' ") or die (mysqli_error($conn));

                                            if($result == true)
                                            {
                                                echo "<script> window.location = 'logout.php ' </script>";
                                            }
                                            else
                                            {
                                                echo "error";
                                            }

                                            
                                            
                                        }
                                        else
                                        {
                                            echo "Oldpassword Invalid!";
                                            
                                        }

                                        
                                    }

                                ?>
                                <form id="frm" class="form-horizontal" method="POST">

                                <div class="mb-3">
                                        <label class="form-label">Old Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="oldpw" name="oldpw" class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <!-- <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="newpw" name="newpw" class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <!-- <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div> -->
                                    </div><br>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="confirmpw" name="confirmpw" class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon">
                                            <!-- <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button id="btnsubmit" name="btnsubmit" class="btn btn-primary waves-effect waves-light" type="submit">Change Password</button>
                                        
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <a href="dashboard.php" id="submit" name="submit" class="btn btn-danger waves-effect waves-light" type="submit">Cancel</a>
                                        
                                    </div>

                                     

                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                         
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
                    newpw: {
                        required: true
                    },
                    confirmpw: {
                        required: true,
                        equalTo: "#newpw"
                    },
                    oldpw: {
                        required: true
                    }
                },

                messages: {

                    newpw: {
                        required: "please enter new password"
                    },
                    confirmpw: {
                        required: "please enter confirm password",
                        equalTo:"Newpassword and confirm password should be same"
                    
                    },
                    oldpw: {
                        required: "please enter your old password"
                    }

                }

            });


        });
    </script>
</body>


</html>