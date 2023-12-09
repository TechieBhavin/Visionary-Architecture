<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update Your Profile</title>
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
        .mb-0 {
            margin-bottom: 10px !important;
        }
    </style>

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <?php include 'header.php' ?>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'vertical_menu.php' ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->

                    <!-- end page title -->


                    <!-- end card -->



                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Information</h4>

                            <?php

                            $id = $_SESSION["architectid"];

                            // echo $id;

                            $sql = mysqli_query($conn, "select * from tbl_architect as a left join tbl_city as c on c.city_id=a.city_id where architect_id='$id'");
                             
                            $row = mysqli_fetch_assoc($sql);

                            ?>

                            <?php
                            if (isset($_POST["btnsubmit"])) {

                                $name = $_POST["name"];
                                $cid = $_POST["cid"];                                       
                                $contact = $_POST["contact"];
                                $mail = $_POST["mail"];
                                $profile = "abc.png";
                                $pass = $_POST["pass"];
                                $gender = $_POST["gender"];
                                $fname = $_POST["fname"];
                                $fcontact = $_POST["fcontact"];
                                $fmail = $_POST["fmail"];
                                $wed = $_POST["web"];
                                $exp = $_POST["exp"];
                                $spc = $_POST["spc"];
                                $certi = "xyc.png";
                                $cname = $_POST["cname"];                                       
                                $cover = "abc.png";
                                $address = $_POST["address"];
                                $landmark = $_POST["landmark"];
                                $pincode = $_POST["pincode"];
                                $lattitude = $_POST["lattitude"];
                                $longtitude = $_POST["longtitude"];
                                $about = $_POST["about"];      
                                $id = $_SESSION["architectid"];



                                        $result = mysqli_query($conn, "update tbl_architect set name='$name',city_id='$cid',contact='$contact',email='$mail',profile_photo='$profile',password='$pass'firm_name='$fname',firm_contact='$fcontact',firm_mail='$fmail',website='$wed',experience='$exp',specialization='$spc', certificate_photo='$certi',certificate_name='$cname,cover_photo='$cover',address='$address',landmark='$landmark',pincode='$pincode',lattitude='$lattitude',longtitude='$longtitude',about_us='$about' where architect_id='$id'") or die(mysqli_errno($conn));

                                if ($result == true) {
                                    echo "update";

                                    echo "<script>window.location='login.php'</script>";
                                } else {
                                    echo "error";
                                }
                            }

                            ?>

                            <div class="table-responsive">
                                <form method="post">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">architect Name :</th>
                                                <td><input type="text" value="<?php echo $row["name"]  ?>" class="form-control" name="name" id="name" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">city Name :</th>
                                                <td><input type="text" value="<?php echo $row["city_name"]  ?>" class="form-control" name="cid" id="cid" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Contact Number :</th>
                                                <td><input type="text" value="<?php echo $row["contact"]  ?>" class="form-control" name="contact" id="contact" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">E-mail :</th>
                                                <td><input type="text" value="<?php echo $row["email"]  ?>" class="form-control" name="mail" id="mail"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Password :</th>
                                                <td><input type="text" value="<?php echo $row["password"]  ?>" class="form-control" name="pass" id="pass"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">profile_photo :</th>
                                                <td><input type="text" value="<?php echo $row["profile_photo"]  ?>" class="form-control" name="profile" id="profile" placeholder="Enter Username"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">gender :</th>
                                                <td><input type="text" value="<?php echo $row["gender"]  ?>" class="form-control" name="gender" id="gender" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">firm_name :</th>
                                                <td><input type="text" value="<?php echo $row["firm_name"]  ?>" class="form-control" name="fname" id="fname" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">firm_contact :</th>
                                                <td><input type="text" value="<?php echo $row["firm_contact"]  ?>" class="form-control" name="fcontact" id="fcontact"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">firm_mail :</th>
                                                <td><input type="text" value="<?php echo $row["firm_mail"]  ?>" class="form-control" name="fmail" id="fmail"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">website :</th>
                                                <td><input type="text" value="<?php echo $row["website"]  ?>" class="form-control" name="web" id="web" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">experience :</th>
                                                <td><input type="text" value="<?php echo $row["addhar_card_photo"]  ?>" class="form-control" name="exp" id="exp"  ></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">specialization :</th>
                                                <td><input type="text" value="<?php echo $row["specialization"]  ?>" class="form-control" name="spc" id="spc" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">certificate_photo :</th>
                                                <td><input type="text" value="<?php echo $row["certificate_photo"]  ?>" class="form-control" name="certi" id="certi"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">certificate_name :</th>
                                                <td><input type="text" value="<?php echo $row["certificate_name"]  ?>" class="form-control" name="cname" id="cname"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">cover_photo :</th>
                                                <td><input type="text" value="<?php echo $row["cover_photo"]  ?>" class="form-control" name="cover" id="cover"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">address :</th>
                                                <td><input type="text" value="<?php echo $row["address"]  ?>" class="form-control" name="address" id="address" placeholder="Enter Username" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">landmark :</th>
                                                <td><input type="text" value="<?php echo $row["landmark"]  ?>" class="form-control" name="landmark" id="landmark"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">pincode :</th>
                                                <td><input type="text" value="<?php echo $row["pincode"]  ?>" class="form-control" name="pincode" id="pincode" ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">lattitude :</th>
                                                <td><input type="text" value="<?php echo $row["lattitude"]  ?>" class="form-control" name="lattitude" id="lattitude"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">longtitude :</th>
                                                <td><input type="text" value="<?php echo $row["longtitude"]  ?>" class="form-control" name="longtitude" id="longtitude"  ></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">about_us :</th>
                                                <td><input type="text" value="<?php echo $row["about_us"]  ?>" class="form-control" name="about" id="about" ></td>
                                            </tr>




                                        </tbody>
                                    </table>
                                    <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Edit</button>
                                    <a href="profilepage.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </form>


                            </div>




                        </div>
                    </div>
                    <!-- end card -->


                    <!-- end card -->
                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php include('footer.php') ?>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                </div>
                <div class="form-check form-switch mb-5">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                    <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>

    <!-- <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script> -->






</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>