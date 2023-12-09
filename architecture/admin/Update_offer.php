<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update offers</title>
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
                                <h4 class="mb-sm-0 font-size-18">Update offers</h4>

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

                                        $name = $_POST["name"];
                                        $discount = $_POST["discount"];
                                        $min_purchase_amount = $_POST["min_purchase_amount"];
                                        $start_date = $_POST["start_date"];
                                        $end_date = $_POST["end_date"];
                                        $isactive = $_POST["isactive"];
                                         
                                        $id = $_GET["updateid"];

                                        // echo $state;
                                        $sql = mysqli_query($conn, "select * from offers where title='$offer_name' ");

                                        if (mysqli_num_rows($sql) <= 0) {

                                        $result = mysqli_query($conn , "update offers set offer_name='$offer_name' , discount='$discount' , min_purchase_amount='$min_purchase_amount', start_date='$start_date', end_date='$end_date', isactive='$isactive' where offer_id='$id' ") or die(mysqli_errno($conn));

                                        if ($result == true) {

                                            echo "<script>window.location='View_offers.php'</script>";
                                        } else {
                                            echo "error";
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

                                    <?php
                                    
                                    if(isset($_GET["updateid"]))
                                    {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn,"select * from tbl_offers where oid='$id'");
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    
                                ?>


                                    <form id="frm" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">offer_name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["offer_name"] ?>" type="text" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">discount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["discount"] ?>"  type="text" name="discount" id="discount">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">min_purchase_amount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["min_purchase_amount"] ?>"  type="text" name="min_purchase_amount" id="min_purchase_amount">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">start_date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["start_date"] ?>" type="text" name="start_date" id="start_date">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">end_date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["end_date"] ?>" type="text" name="end_date" id="end_date">
                                            </div>
                                        </div>
                                        
                                         
                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update offers</button>
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
                    dis: {
                        required: true
                    },
                    cc: {
                        required: true
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
                    dis: {
                        required: "please enter the discount"
                    },
                    cc: {
                        required: "please enter the coupon code"
                    },

                }

            });


        });
    </script> 



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>