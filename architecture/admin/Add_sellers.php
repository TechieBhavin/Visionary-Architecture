<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add seller</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add seller</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_sellers.php" class="btn btn-primary waves-effect waves-light">Back</a>
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
                                        
                                       // $photo = "pqr.png";
                                        //$logo = "abc.png";
                                        $weburl = $_POST["weburl"];
                                        $gstno = $_POST["gstno"];
                                      
                                        //$certi = "xyz.png";
                                        $date = $_POST["date"];
                                        $about = $_POST["about"];
                                        $fpage = $_POST["fpage"];
                                        $insta = $_POST["insta"];
                                        $address = $_POST["address"];
                                        $landmark = $_POST["landmark"];
                                        $pincode = $_POST["pincode"];
                                        $lattitude = $_POST["lattitude"];
                                        $longtitude = $_POST["longtitude"];

                                        $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
                                        $filename1 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/seller/cover photo/" . $filename1);

                                        $ext = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                                        $filename2 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/seller/logo/" . $filename2);

                                        $ext = pathinfo($_FILES["certi"]["name"], PATHINFO_EXTENSION);
                                        $filename3 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["certi"]["tmp_name"], "uploads/seller/gst certificate photo/" . $filename3);

                                        $sql = mysqli_query($conn,"select * from tbl_seller where name='$name' and city_id='$cid' ");

                                        if(mysqli_num_rows($sql) <=0)
                                        {

                                        $result = mysqli_query($conn, "insert into tbl_seller (city_id,name,shop_name,contact,email,password,cover_photo,logo,website_url,gst_no,gst_certi_photo,regi_datetime,about,facebook_page,insta_id,address,landmark,pincode,lattitude,longtitude) values ('$cid','$name','$sname','$cno','$mail','$pass','$filename1','$filename2','$weburl','$gstno','$filename3','$date','$about','$fpage','$insta','$address','$landmark','$pincode','$lattitude','$longtitude') ") or die(mysqli_error($conn));

                                        if ($result == true) {
                                    ?>
                                            <div class="alert alert-info mb-0" role="alert">
                                                seller Inserted!
                                            </div>
                                        <?php

                                        } else {

                                        ?>
                                            <div class="alert alert-warning mb-0" role="alert">
                                                Error!
                                            </div>
                                    <?php
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


                                    <form id="frm" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">city name</label>
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
                                            <label for="example-text-input" class="col-md-2 col-form-label">name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">shop name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="sname" id="sname">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">contact number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="cno" id="cno">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">e-mail</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="mail" id="mail">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="pass" id="pass">
                                            </div>
                                        </div>
                                         
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">cover photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="photo" id="photo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">logo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="logo" id="logo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">website url</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="weburl" id="weburl">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">gst number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="gstno" id="gstno">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">gst certificate photo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="certi" id="certi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">register date & time</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" name="date" id="date">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">about seller</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="about" id="about">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">facebook page</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="fpage" id="fpage">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">instagram page / id</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="insta" id="insta">
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




                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add seller</button>
                                            <a href="View_sellers.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
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

    <!-- <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script> -->


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
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    logo: {
                        required: true,
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
                        required: true,
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
                        required: true,
                        maxlength: 6,
                        minlength:6
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
                        required: "please select image",
                        accept: 'This is not an image!'
                    },
                    logo: {
                        required: "please select image",
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
                        required: "please select image",
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
                        required: "please enter pincode",
                        maxlength: "please enter 6 number",
                        minlength: "please enter 6 number"
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