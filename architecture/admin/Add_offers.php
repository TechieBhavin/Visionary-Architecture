<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add offers</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add offers</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_offers.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                        $title = $_POST["title"];
                                        $des = $_POST["des"];
                                        $min = $_POST["min"];
                                        $max = $_POST["max"];
                                        $dis = $_POST["dis"];
                                        $img = $_POST["img"];
                                        $cc = $_POST["cc"];
                                        $active = $_POST["active"];
                                        $start = $_POST["start"];
                                        $end = $_POST["end"];

                                        // echo $title;
                                        // echo "<br/>";
                                        // echo $des;
                                        // echo "<br/>";
                                        // echo $min;
                                        // echo "<br/>";
                                        // echo $max;
                                        // echo "<br/>";
                                        // echo $dis;
                                        // echo "<br/>";
                                        // echo $cc;
                                        // echo "<br/>";
                                        // echo $active;

                                        $sql = mysqli_query($conn, "select * from tbl_offers where title='$title' ");

                                        if (mysqli_num_rows($sql) <= 0) {

                                        $result = mysqli_query($conn, "insert into tbl_offers (title,description,img_url,isactive,max_value,min_value,discount,coupon_code,start_date_time,end_date_time) values ('$title','$des','$img','$active','$max','$min',' $dis','$cc','$start','$end')") or die(mysqli_error($conn));

                                        if ($result == true) {
                                            // echo "inserted";

                                    ?>
                                            <div class="alert alert-info mb-0" role="alert">
                                                offers Inserted!
                                            </div>
                                        <?php
                                        } else {
                                            // echo "error";

                                        ?>
                                            <div class="alert alert-info mb-0" role="alert">
                                                Error !
                                            </div>
                                    <?php
                                        }
                                        
                                    }
                                    else {
                                        ?>
                                        <div class="alert alert-warning mb-0" role="alert">
                                            Offer Already Exits!
                                        </div>
                                <?php
                                    }
                                }


                                    ?>


                                    <form id="frm" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Offer name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title" id="title">
                                            </div>
                                        </div>
                                        

                                         
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Discount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="dis" id="dis">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">minimun purchase amount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="cc" id="cc">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mt-4">
                                                <h5 class="font-size-14 mb-4">Isactive</h5>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" value="yes" type="radio" name="active" id="active" checked>
                                                    <label class="form-check-label" for="formRadios1">
                                                        yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="no" type="radio" name="active" id="active">
                                                    <label class="form-check-label" for="formRadios2">
                                                        no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Starting date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" name="start" id="start">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Ending date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" name="end" id="end">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add offers</button>
                                            <a href="View_offers.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
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

    <!-- <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script> -->

    
    <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    title: {
                        required: true
                    },
                    des: {
                        required: true

                    },
                    img: {
                        required: true
                    },
                    min: {
                        required: true
                    },
                    max: {
                        required: true
                    },
                    start: {
                        required: true,
                        // max: '#end'
                        // lessThan:"#start"
                    },
                    end: {
                        required: true,
                        // min: '#start'
                        // lessThan:"#start",
                        greaterThan:"#start"
                    },



                },

                messages: {

                    title: {
                        required: "Please Enter Name"
                    },
                    des: {
                        required: "Please enter description"

                    },
                    img: {
                        required: "please enter the image URL"
                    },
                    min: {
                        required: "please enter the minimum value"
                    },
                    max: {
                        required: "please enter the maximun value"
                    },
                    start: {
                        required: "please enter the discount",
                        // max:"The start date is not a valid "
                        // lessThan:"The start date is not a valid",
                    },
                    end: {
                        required: "please enter the coupon code",
                        // min:"The end date is not a valid"
                        // lessThan:"#start",
                        greaterThan:"#start"
                    },

                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>