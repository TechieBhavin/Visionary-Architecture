<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title> Architect Registration</title>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18"> Architect Registration</h4>



                            </div>
                        </div>
                    </div>

                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body p-4">

                                 
                                 

                                    <form method="POST" enctype="multipart/form-data" id="frm">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="name" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">E-mail</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="mail" id="mail">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md- col-form-label">City</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control" name="cid" id="cid">

                                                                <option value="">Select City Name</option>
                                                                <?php
                                                                $count = "1";
                                                                $result = mysqli_query($conn, "select * from tbl_city") or die(mysqli_error($conn));

                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                ?>
                                                                    <option value="<?php echo $row["city_id"] ?>"><?php echo $row["city_name"] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Address</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="textarea" name="address" id="address">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Profile Photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="profile" id="profile">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col col-form-label">Firm name </label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="fname" id="fname">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Firm Contact</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="fcontact" id="fcontact">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Firm E-mail</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="fmail" id="fmail">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Certificate Photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="certi" id="certi">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Cerfiticate Name</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="cname" id="cname">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md- col-form-label">Landmark</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="landmark" id="landmark">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md- col-form-label">lattitude</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="lattitude" id="lattitude">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">Register Date & Time</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="datetime-local" name="reg" id="reg">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md- col-form-label">Conatct Number</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="contact" id="contact">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md- col-form-label">Password</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="pass" id="pass">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md- col-form-label">About Architect</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="about" id="about">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Cover Photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="cover" id="cover">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md col-form-label">Qualification</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="qua" id="qua">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Website</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="web" id="web">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="col-md  col-form-label">Addhar Card Photo</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="file" name="addharpic" id="addharpic">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Addhar Card Number</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="addharno" id="addharno">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">Specialization</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="spc" id="spc">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md  col-form-label">Experience</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="text" name="exp" id="exp">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Pincode</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="textarea" name="pincode" id="pincode">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="example-text-input" class="col-md col-form-label">Longtitude</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" type="textarea" name="longtitude" id="longtitude">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                <a href="architectlogin.php" type="submit" class="btn btn-danger waves-effect waves-light">Cancel</a>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <?php include 'footer.php' ?>
            </div>
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
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyApJ6M2P5Ha63F5cQ9J3mMmEZuo_3p7Auw" type="text/javascript"></script>
        <script src="assets/js/locationpicker.jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                $("#frm").validate({

                    rules: {
                        cid: {
                            required: true
                        },
                        name: {
                            required: true
                        },
                        contact: {
                            required: true
                        },
                        mail: {
                            required: true
                        },
                        profile: {
                            required: true,
                            accept: "image/jpg,image/jpeg,image/png,image/gif"

                        },
                        fname: {
                            required: true
                        },
                        fmail: {
                            required: true
                        },
                        fcontact: {
                            required: true
                        },
                        web: {
                            required: true
                        },
                        otp: {
                            required: true
                        },
                        addharpic: {
                            required: true,
                            accept: "image/jpg,image/jpeg,image/png,image/gif"
                        },
                        addharno: {
                            required: true
                        },
                        qua: {
                            required: true
                        },
                        exp: {
                            required: true
                        },
                        spc: {
                            required: true
                        },
                        certi: {
                            required: true,
                            accept: "image/jpg,image/jpeg,image/png,image/gif"
                        },
                        cname: {
                            required: true
                        },
                        reg: {
                            required: true
                        },
                        cover: {
                            required: true,
                            accept: "image/jpg,image/jpeg,image/png,image/gif"
                        },
                        address: {
                            required: true
                        },
                        landmark: {
                            required: true
                        },
                        pincode: {
                            required: true
                        },
                        lattitude: {
                            required: true
                        },
                        longtitude: {
                            required: true
                        },
                        about: {
                            required: true
                        },
                        gender: {
                            required: true
                        }

                    },

                    messages: {

                        cid: {
                            required: "Please select any city"
                        },
                        name: {
                            required: "Please enter name"
                        },
                        contact: {
                            required: "Please enter mobile number"
                        },
                        mail: {
                            required: "Please enter E-mail"
                        },
                        profile: {
                            required: "Please Select Photo",
                            accept: 'This is not an image!'
                        },
                        fname: {
                            required: "please enter the firm name"
                        },
                        fmail: {
                            required: "please enter the firm e-mail"
                        },
                        fcontact: {
                            required: "please enter the firm contact number"
                        },
                        web: {
                            required: "please enter the website name"
                        },
                        otp: {
                            required: "please enter the valid otp"
                        },
                        addharpic: {
                            required: "please select the addhar card image",
                            accept: 'This is not an image!'
                        },
                        addharno: {
                            required: "please enter the addhar card number"
                        },
                        qua: {
                            required: "please enter the your qualification"
                        },
                        exp: {
                            required: "please enter the your experience"
                        },
                        spc: {
                            required: "please enter the your specialization"
                        },
                        certi: {
                            required: "please select your certificate photo",
                            accept: 'This is not an image!'
                        },
                        cname: {
                            required: "please enter the cerficate name"
                        },
                        reg: {
                            required: "please select the date and time"
                        },
                        cover: {
                            required: "please select the cover photo",
                            accept: 'This is not an image!'
                        },
                        address: {
                            required: "please enter the address"
                        },
                        landmark: {
                            required: "please enter the landmark"
                        },
                        pincode: {
                            required: "please enter the pincode"
                        },
                        lattitude: {
                            required: "please enter the lattitude"
                        },
                        longtitude: {
                            required: "please enter the longtitude"
                        },
                        about: {
                            required: "please enter the about us"
                        },
                        gender: {
                            required: "please select your gender"
                        }
                    }

                });


            });
        </script>
        <script>
            $('#us2').locationpicker({
                location: {
                    latitude: 21.170240,
                    longitude: 72.831062
                },
                radius: 0,
                inputBinding: {
                    latitudeInput: $('#lattitude'),
                    longitudeInput: $('#longtitude'),
                },
                enableAutocomplete: true
            });
        </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>