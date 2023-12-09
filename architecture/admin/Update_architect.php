<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update Architect</title>
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
                                <h4 class="mb-sm-0 font-size-18">Update Architect</h4>

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
                                        $cid = $_POST["cid"];
                                        $name = $_POST["name"];
                                        $contact = $_POST["contact"];
                                        $mail = $_POST["mail"];
                                        // $profile = "abc.png";
                                        $gender = $_POST["gender"];
                                        $fname = $_POST["fname"];
                                        $fcontact = $_POST["fcontact"];
                                        $fmail = $_POST["fmail"];
                                        $wed = $_POST["web"];
                                        $otp = $_POST["otp"];
                                        $verify = $_POST["verify"];
                                        // $addharpic = "pqr.png";
                                        $addharno = $_POST["addharno"];
                                        $qua = $_POST["qua"];
                                        $exp = $_POST["exp"];
                                        $spc = $_POST["spc"];
                                        // $certi = "xyc.png";
                                        $cname = $_POST["cname"];
                                        $reg = $_POST["reg"];
                                        $block = $_POST["block"];
                                        $approve = $_POST["approve"];
                                        // $cover = "abc.png";
                                        $address = $_POST["address"];
                                        $landmark = $_POST["landmark"];
                                        $pincode = $_POST["pincode"];
                                        $lattitude = $_POST["lattitude"];
                                        $longtitude = $_POST["longtitude"];
                                        $about = $_POST["about"];
                                        $pass = $_POST["pass"];
                                        $id = $_GET["updateid"];

                                        $oldimage1 = $_POST["oldprofile"];
                                        $newimage1 = "";

                                        $oldimage2 = $_POST["oldadhar"];
                                        $newimage2 = "";

                                        $oldimage3 = $_POST["oldcerti"];
                                        $newimage3 = "";

                                        $oldimage4 = $_POST["oldcoverimg"];
                                        $newimage4 = "";

                                        $sql = mysqli_query($conn,"select * from tbl_architect where name='$name' ");

                                        if(mysqli_num_rows($sql) <=0)
                                        {

                                        if (empty($_FILES["profile"]["name"])) {
                                            $newimage1 = $oldimage1;
                                        } else {
                                            unlink("uploads/architect/" . $oldimage1);


                                            $ext = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
                                            $filename1 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["profile"]["tmp_name"], "uploads/architect/" . $filename1);
                                            $newimage1 = $filename1;
                                        }

                                        if (empty($_FILES["addharpic"]["name"])) {
                                            $newimage2 = $oldimage2;
                                        } else {
                                            unlink("uploads/architect/" . $oldimage2);


                                            $ext = pathinfo($_FILES["addharpic"]["name"], PATHINFO_EXTENSION);
                                            $filename2 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["addharpic"]["tmp_name"], "uploads/architect/" . $filename2);
                                            $newimage2 = $filename2;
                                        }

                                        if (empty($_FILES["certi"]["name"])) {
                                            $newimage3 = $oldimage3;
                                        } else {
                                            unlink("uploads/architect/" . $oldimage3);


                                            $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/architect/" . $filename3);
                                            $newimage3 = $filename3;
                                        }
                                        

                                        if (empty($_FILES["cover"]["name"])) {
                                            $newimage4 = $oldimage4;
                                        } else {
                                            unlink("uploads/architect/" . $oldimage3);


                                            $ext = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
                                            $filename4 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/architect/" . $filename4);
                                            $newimage4 = $filename4;
                                        }


                                        $result = mysqli_query($conn, "update tbl_architect set city_id='$cid', name='$name', contact='$contact', email='$mail' ,profile_photo='$newimage1',firm_name='$fname', firm_contact='$fcontact', firm_mail='$fmail', website='$wed', otp='$otp', isverify='$verify', addhar_card_photo='$newimage2', addhar_card_number='$addharno', qualification='$qua', experience='$exp', specialization='$spc', certificate_photo='$newimage3', certificate_name='$cname', regi_date_time='$reg', isblocked='$block', isapproved='$approve',  cover_photo='$newimage4', address='$address', landmark='$landmark', pincode='$pincode', lattitude='$lattitude', longtitude='$longtitude', about_us='$about',password='$pass' where architect_id='$id'") or die(mysqli_errno($conn));

                                        if ($result == true) {

                                            echo "<script>window.location='Viewarchitect.php'</script>";
                                        } else {
                                            echo "error";
                                        }
                                    }
                                    else {
                                        ?>
                                        <div class="alert alert-warning mb-0" role="alert">
                                            architect already exists !
                                        </div>
                                <?php
                                    }
                                    }

                                    ?>

                                    <?php

                                    if (isset($_GET["updateid"])) {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn, "select * from tbl_architect where architect_id='$id'");
                                        while ($row = mysqli_fetch_assoc($result)) {

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
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["name"] ?>" type="text" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Contact</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["contact"] ?>" type="text" name="contact" id="contact">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">E-mail</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["email"] ?>" type="text" name="mail" id="mail">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["password"] ?>" type="text" name="pass" id="pass">
                                            </div>
                                        </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Profile Photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="profile" id="profile">
                                                        <img height="100px" width="100px" src="uploads/architect/<?php echo $row["profile_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["profile_photo"] ?>" type="hidden" name="oldprofile" id="profile">
                                                </div>

                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">Gender</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="male" <?php if ($row["gender"] == "male") { ?> checked <?php } ?>  type="radio" name="gender" id="gender" >
                                                            <label class="form-check-label" for="formRadios1">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="female" <?php if ($row["gender"] == "female") { ?> checked <?php } ?>  type="radio" name="gender" id="gender">
                                                            <label class="form-check-label" for="formRadios2">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Firm Name</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["firm_name"] ?>" type="text" name="fname" id="fname">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Firm Contact</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["firm_contact"] ?>" type="text" name="fcontact" id="fcontact">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Firm E-mail</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["firm_mail"] ?>" type="text" name="fmail" id="fmail">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Website</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["website"] ?>" type="text" name="web" id="web">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">OTP</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["otp"] ?>" type="text" name="otp" id="otp">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsVerify</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isverify"] == "yes") { ?> checked <?php } ?>  type="radio" name="verify" id="verify"  >
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input"value="no" <?php if ($row["isverify"] == "no") { ?> checked <?php } ?> type="radio" name="verify" id="verify">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Addhar Card Photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="addharpic" id="addharpic">
                                                        <img height="100px" width="100px" src="uploads/architect/<?php echo $row["addhar_card_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["addhar_card_photo"] ?>" type="hidden" name="oldadhar" id="addharpic">
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Addhar Card Number</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["addhar_card_number"] ?>" type="text" name="addharno" id="addharno">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Qualification</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["qualification"] ?>" type="text" name="qua" id="qua">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Experience</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["experience"] ?>" type="text" name="exp" id="exp">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Specialization</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["specialization"] ?>" type="text" name="spc" id="spc">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Cerfificate Photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="certi" id="certi">
                                                        <img height="100px" width="100px" src="uploads/architect/<?php echo $row["certificate_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["certificate_photo"] ?>" type="hidden" name="oldcerti" id="certi">
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Certificate Name</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["certificate_name"] ?>" type="text" name="cname" id="cname">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Register Date & Time</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" name="reg" id="reg">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsBlocked</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isblocked"] == "yes") { ?> checked <?php } ?> type="radio" name="block" id="block" >
                                                            <label class="form-check-label" for="formRadios1">
                                                                yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" <?php if ($row["isblocked"] == "no") { ?> checked <?php } ?>  type="radio" name="block" id="block">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsApprove</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isapproved"] == "yes") { ?> checked <?php } ?>  type="radio" name="approve" id="approve">
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" <?php if ($row["isapproved"] == "no") { ?> checked <?php } ?> type="radio" name="approve" id="approve">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Cover Photo</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="cover" id="cover">
                                                        <img height="100px" width="100px" src="uploads/architect/<?php echo $row["cover_photo"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["cover_photo"] ?>" type="hidden" name="oldcoverimg" id="cover">
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
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">About Us</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["about_us"] ?>" type="text" name="about" id="about">
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update Architect</button>
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
                         
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    cname: {
                        required: true
                    },
                    reg: {
                        required: true
                    },
                    cover: {
                       
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
                       
                        accept: 'This is not an image!'
                    },
                    cname: {
                        required: "please enter the cerficate name"
                    },
                    reg: {
                        required: "please select the date and time"
                    },
                    cover: {
                        
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
                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>