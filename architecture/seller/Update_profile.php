<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update seller</title>
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
                                <h4 class="mb-sm-0 font-size-18">Update seller</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="profilepage.php" class="btn btn-primary waves-effect waves-light">Back</a>
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
                                        $cid = $_POST["cid"];
                                        $name = $_POST["name"];
                                        $sname = $_POST["sname"];
                                        $cno = $_POST["cno"];
                                        $mail = $_POST["mail"];
                                        $pass = $_POST["pass"];
                                        $verify = $_POST["verify"];
                                        $otp = $_POST["otp"];
                                        $block = $_POST["block"];
                                        $approve = $_POST["approve"];
                                        $photo = "pqr.png";
                                        $logo = "abc.png";
                                        $weburl = $_POST["weburl"];
                                        $gstno = $_POST["gstno"];
                                        $proof = $_POST["proof"];
                                        $certi = "xyz.png";
                                        $date = $_POST["date"];
                                        $about = $_POST["about"];
                                        $fpage = $_POST["fpage"];
                                        $insta = $_POST["insta"];
                                        $address = $_POST["address"];
                                        $landmark = $_POST["landmark"];
                                        $pincode = $_POST["pincode"];
                                        $lattitude = $_POST["lattitude"];
                                        $longtitude = $_POST["longtitude"];
                                        $id = $_GET["updateid"];

                                        $oldimage1 = $_POST["oldcoverimg"];
                                        $newimage1 = "";

                                        $oldimage2 = $_POST["oldlogo"];
                                        $newimage2 = "";

                                        $oldimage3 = $_POST["oldcerti"];
                                        $newimage3 = "";

                                        $sql = mysqli_query($conn,"select * from tbl_seller where name='$name' ");

                                        if(mysqli_num_rows($sql) <=0)
                                        {

                                        if (empty($_FILES["photo"]["name"])) {
                                            $newimage1 = $oldimage1;
                                        } else {
                                            unlink("uploads/seller/cover photo/" . $oldimage1);


                                            $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
                                            $filename1 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/seller/cover photo/" . $filename1);
                                            $newimage1 = $filename1;
                                        }

                                        if (empty($_FILES["logo"]["name"])) {
                                            $newimage2 = $oldimage2;
                                        } else {
                                            unlink("uploads/seller/logo/" . $oldimage2);


                                            $ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                                            $filename2 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/seller/logo/" . $filename2);
                                            $newimage2 = $filename2;
                                        }

                                        if (empty($_FILES["certi"]["name"])) {
                                            $newimage3 = $oldimage3;
                                        } else {
                                            unlink("uploads/seller/gst certificate photo/" . $oldimage3);


                                            $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/seller/gst certificate photo/" . $filename3);
                                            $newimage3 = $filename3;
                                        }

                                        // echo $state;

                                        $result = mysqli_query($conn, "update tbl_seller set city_id='$cid' , name ='$name' , shop_name='$sname' , contact = '$cno' , email='$mail' ,password='$pass' , isverify='$verify' , otp='$otp' , isblock='$block' , isapprove= '$approve' , cover_photo ='$filename1', logo ='$filename2', website_url= '$weburl', gst_no='$gstno', address_proof='$proof', gst_certi_photo= '$filename3', regi_datetime='$date', about='$about', facebook_page='$fpage', insta_id='$insta', address='$address', landmark='$landmark', pincode='$pincode', lattitude='$lattitude', longtitude='$longtitude'where seller_id='$id'") or die(mysqli_errno($conn));

                                        if ($result == true) {

                                            echo "<script>window.location='View_sellers.php'</script>";
                                        } else {
                                            echo "error";
                                        }
                                    }
                                    else {
                                        ?>
                                        <div class="alert alert-warning mb-0" role="alert">
                                            seller already exists !
                                        </div>
                                <?php
                                    }
                                    }

                                    ?>

                                    <?php

                                    if (isset($_GET["updateid"])) {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn, "select * from tbl_seller where seller_id='$id'");
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>


                                            <form id="frm" method="POST" enctype="multipart/form-data">
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">city name</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="cid" id="cid">

                                                            <option value="">Select City Name</option>
                                                            <?php
                                                            $count = "1";
                                                            $result = mysqli_query($conn, "select * from tbl_city") or die(mysqli_error($conn));

                                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <option <?php if ($row1["city_id"] == $row["city_id"]) { ?> selected <?php } ?> value=" <?php echo $row1["city_id"] ?>"><?php echo $row1["city_name"] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">name</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["name"] ?>" type="text" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">shop name</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["shop_name"] ?>" type="text" name="sname" id="sname">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">contact number</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["contact"] ?>" type="text" name="cno" id="cno">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">e-mail</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["email"] ?>" type="text" name="mail" id="mail">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">password</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["password"] ?>" type="text" name="pass" id="pass">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsVerify</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" type="radio" name="verify" id="verify" checked>
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" type="radio" name="verify" id="verify">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">otp</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["otp"] ?>" type="text" name="otp" id="otp">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">isblock</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isblock"] == "yes") { ?> checked <?php } ?> type="radio" name="block" id="block">
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" <?php if ($row["isblock"] == "no") { ?> checked <?php } ?> type="radio" name="block" id="block">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">isapprove</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isapprove"] == "yes") { ?> checked <?php } ?> type="radio" name="approve" id="approve">
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" <?php if ($row["isapprove"] == "no") { ?> checked <?php } ?> type="radio" name="approve" id="approve">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">cover photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="photo" id="photo">
                                                        <img height="100px" width="100px" src="uploads/seller/cover photo/<?php echo $row["cover_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["cover_photo"] ?>" type="hidden" name="oldcoverimg" id="photo">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">logo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="logo" id="logo">
                                                        <img height="100px" width="100px" src="uploads/seller/logo/<?php echo $row["logo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["logo"] ?>" type="hidden" name="oldlogo" id="logo">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">website url</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["website_url"] ?>" type="text" name="weburl" id="weburl">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">gst number</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["gst_no"] ?>" type="text" name="gstno" id="gstno">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">address proof</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["address_proof"] ?>" type="text" name="proof" id="proof">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">gst certificate photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="certi" id="certi">
                                                        <img height="100px" width="100px" src="uploads/seller/gst certificate photo/<?php echo $row["gst_certi_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["gst_certi_photo"] ?>" type="hidden" name="oldcerti" id="certi">
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">register date & time</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" name="date" id="date">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">about</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["about"] ?>" type="text" name="about" id="about">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">facebook page</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["facebook_page"] ?>" type="text" name="fpage" id="fpage">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">instagram page / id</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["insta_id"] ?>" type="text" name="insta" id="insta">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Address</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["address"] ?>" type="text" name="address" id="address">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Landmark</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["landmark"] ?>" type="text" name="landmark" id="landmark">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Pincode</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["pincode"] ?>" type="text" name="pincode" id="pincode">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Lattitude</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["lattitude"] ?>" type="text" name="lattitude" id="lattitude">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Longtitude</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["longtitude"] ?>" type="text" name="longtitude" id="longtitude">
                                                    </div>
                                                </div>




                                                <div>
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update seller</button>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
                                                </div>
                                        <?php
                                        }
                                    }
                                        ?>
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

    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>


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
                    sname: {
                        required: true
                    },
                    cno: {
                        required: true
                    },
                    mail: {
                        required: true
                    },
                    pass: {
                        required: true
                    },
                    otp: {
                        required: true
                    },
                    photo: {
                         
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    logo: {
                      
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    weburl: {
                        required: true
                    },
                    gstno: {
                        required: true
                    },
                    proof: {
                        required: true
                    },
                    certi: {
                         
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    date: {
                        required: true
                    },
                    fpage: {
                        required: true
                    },
                    insta: {
                        required: true
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
                },

                messages: {

                    cid: {
                        required: "please enter city id"
                    },
                    name: {
                        required: "please enter name"
                    },
                    sname: {
                        required: "please enter the shop name"
                    },
                    cno: {
                        required: "please enter contact number"
                    },
                    mail: {
                        required: "please enter the e-mail"
                    },
                    pass: {
                        required: "password is required"
                    },
                    otp: {
                        required: "please enter the otp"
                    },
                    photo: {
                         
                        accept: 'This is not an image!'
                    },
                    logo: {
                         
                        accept: 'This is not an image!'
                    },
                    weburl: {
                        required: "please enter website url"
                    },
                    gstno: {
                        required: "please enter gst number"
                    },
                    proof: {
                        required: "please enter address proof"
                    },
                    certi: {
                      
                        accept: 'This is not an image!'
                    },
                    date: {
                        required: "please select date & time"
                    },
                    fpage: {
                        required: "please enter facebook page"
                    },
                    insta: {
                        required: "please enter instagram page "
                    },
                    address: {
                        required: "please enter the address"
                    },
                    landmark: {
                        required: "please enter landmark"
                    },
                    pincode: {
                        required: "please enter pincode"
                    },
                    lattitude: {
                        required: "please enter lattitude"
                    },
                    longtitude: {
                        required: "please enter longtitude"
                    },

                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html><?php include 'session.php' ?>


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


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
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

    <!-- <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script> -->






</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>