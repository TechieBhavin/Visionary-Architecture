<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add Architect</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add Architect</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="Viewarchitect.php" class="btn btn-primary waves-effect waves-light">Back</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title"> </h4>

                                    <?php

                                    if (isset($_POST["btnsubmit"])) {

                                        // echo "inserted";


                                        // echo $cname;
                                        // echo $sid;
                                        $cid = $_POST["cid"];
                                        $name = $_POST["name"];
                                        $contact = $_POST["contact"];
                                        $mail = $_POST["mail"];
                                        $profile = "abc.png";
                                        
                                        $fname = $_POST["fname"];
                                        $fcontact = $_POST["fcontact"];
                                        $fmail = $_POST["fmail"];
                                        $wed = $_POST["web"];
                                        // $otp = $_POST["otp"];
                                        // $verify = $_POST["verify"];
                                        $addharpic = "pqr.png";
                                        $addharno = $_POST["addharno"];
                                        $qua = $_POST["qua"];
                                        $exp = $_POST["exp"];
                                        $spc = $_POST["spc"];
                                        $certi = "xyc.png";
                                        $cname = $_POST["cname"];
                                        $reg = $_POST["reg"];
                                        // $block = $_POST["block"];
                                        // $approve = $_POST["approve"];
                                        $cover = "abc.png";
                                        $address = $_POST["address"];
                                        $landmark = $_POST["landmark"];
                                        $pincode = $_POST["pincode"];
                                        $lattitude = $_POST["lattitude"];
                                        $longtitude = $_POST["longtitude"];
                                        $pass = $_POST["pass"];

                                        $about = $_POST["about"];

                                        //duplication

                                        $sql = mysqli_query($conn, "select * from tbl_architect where name='$name' and city_id='$cid' ");

                                        if (mysqli_num_rows($sql) <= 0) {




                                            $ext = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
                                            $filename = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["profile"]["tmp_name"], "uploads/architect/" . $filename);

                                            $ext = pathinfo($_FILES["addharpic"]["name"], PATHINFO_EXTENSION);
                                            $filename2 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["addharpic"]["tmp_name"], "uploads/architect/" . $filename2);

                                            $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/architect/" . $filename3);

                                            $ext = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
                                            $filename4 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/architect/" . $filename4);



                                            $result = mysqli_query($conn, " insert into tbl_architect(city_id,name,contact,email,profile_photo,firm_name,firm_contact,firm_mail
                                        ,website,addhar_card_photo,addhar_card_number,qualification,experience,specialization,
                                        certificate_photo,certificate_name,regi_date_time,cover_photo,address,
                                        landmark,pincode,lattitude,longtitude,about_us,password) values ('$cid','$name','$contact','$mail','$filename',
                                         '$fname','$fcontact','$fmail','$wed','$filename2','$addharno','$qua',
                                        '$exp','$spc','$filename3','$cname','$reg','$filename4','$address','$landmark',
                                        '$pincode','$lattitude','$longtitude','$about','$pass') ") or die(mysqli_error($conn));


                                            if ($result == true) {
                                    ?>
                                                <div class="alert alert-info mb-0" role="alert">
                                                    Architect Inserted !
                                                </div>

                                            <?php

                                            } else {
                                            ?>
                                                <div class="alert alert-warning mb-0" role="alert">
                                                    Error !
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="alert alert-warning mb-0" role="alert">
                                                architect already exists !
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>


                                    <form method="POST" enctype="multipart/form-data" id="frm">
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">City Name</label>
                                            <div class="col-md-10">
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


                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Contact</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="contact" id="contact">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">E-mail</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="mail" id="mail">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="pass" id="pass">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Profile Photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="profile" id="profile">
                                            </div>
                                        </div>
                                         

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Firm Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="fname" id="fname">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Firm Contact</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="fcontact" id="fcontact">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Firm E-mail</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="fmail" id="fmail">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Website</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="web" id="web">
                                            </div>
                                        </div>
                                       
                                        <!-- <div class="mb-3 row align-items-center">
                                            <label for="example-text-input" class="col-md-2 col-form-label">isverify</label>
                                            <div class="col-md-10 check-error">
                                                <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="yes" type="radio" name="verify" id="verify"  >
                                                    <label class="form-check-label" for="formRadios1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="no" type="radio" name="verify" id="verify">
                                                    <label class="form-check-label" for="formRadios2">
                                                        No
                                                    </label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>  -->
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Addhar Card Photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="addharpic" id="addharpic">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Addhar Card Number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="addharno" id="addharno">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Qualification</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="qua" id="qua">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Experience</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="exp" id="exp">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Specialization</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="spc" id="spc">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Cerfificate Photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="certi" id="certi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Certificate Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="cname" id="cname">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Register Date & Time</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" name="reg" id="reg">
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 row align-items-center">
                                            <label for="example-text-input" class="col-md-2 col-form-label">IsBlocked</label>
                                            <div class="col-md-10 check-error">
                                                <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="yes" type="radio" name="block" id="block"  >
                                                    <label class="form-check-label" for="formRadios1">
                                                        yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" value="no" type="radio" name="block" id="block">
                                                    <label class="form-check-label" for="formRadios2">
                                                        No
                                                    </label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>  -->
                                        <!-- <div class="mb-3 row align-items-center">
                                            <label for="example-text-input" class="col-md-2 col-form-label">IsApprove</label>
                                            <div class="col-md-10 check-error">
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" value="yes" type="radio" name="approve" id="approve">
                                                        <label class="form-check-label" for="formRadios1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" value="no" type="radio" name="approve" id="approve">
                                                        <label class="form-check-label" for="formRadios2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Cover Photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="cover" id="cover">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Address</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="address" id="address">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Landmark</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="landmark" id="landmark">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Pincode</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="pincode" id="pincode">
                                            </div>
                                        </div>
                                        <div class="mb-3 row" id="us2" style="width: 100%; height: 400px;"></div>
                                        <div class="mb-3 row">
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Lattitude</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="lattitude" id="lattitude">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Longtitude</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="longtitude" id="longtitude">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">About Us</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="about" id="about">
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Architect</button>
                                                <a href="Viewarchitect.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                            </div>
                                    </form>
                                </div>
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

    <!-- <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    cid: {
                        required: true
                    },
                    name: {
                        required: true,
                        lettersonly: true
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
                        required: "Please enter name",
                        lettersonly: "Please Enter Only Text"
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
    </script> -->

    <script>
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");
        $(document).ready(function() {
            $("#frm").validate({

                rules: {
                    cid: {
                        required: true
                    },
                    name: {
                        required: true,
                        lettersonly: true
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
                    pass: {
                        required: true,
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
                        required: "Please enter name",
                        lettersonly: "Please Enter Only Text"
                    },
                    contact: {
                        required: "Please enter mobile number"
                    },
                    mail: {
                        required: "Please enter E-mail"
                    },
                    pass: {
                        required: "please enter password"
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
                        required: "please enter the qualification"
                    },
                    exp: {
                        required: "please enter the experience"
                    },
                    spc: {
                        required: "please enter the specialization"
                    },
                    certi: {
                        required: "please select certificate photo",
                        accept: 'This is not an image!'
                    },
                    cname: {
                        required: "please enter the cerficate name"
                    },
                    reg: {
                        required: "please select the date and time"
                    },
                    cover: {
                        required: "please select the photo",
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
                        required: "please select gender"
                    }
                }

            });

        })
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