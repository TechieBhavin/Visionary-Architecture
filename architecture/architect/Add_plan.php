<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add Plan</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add Plan</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_plan.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                    if(isset($_POST["btnsubmit"])){

                                        $aname = $_POST["aid"];
                                        $catname = $_POST["cat"];
                                        $pat = $_POST["pat"];
                                
                                        $pname = $_POST["pname"];
                                        $price = $_POST["price"];
                                        $dec = $_POST["dec"];
                                        $visit = $_POST["visit"];
                                        $date = $_POST["added"];
                                        $video =$_POST["video"];
                                      


                                        $sql = mysqli_query($conn, "select * from tbl_plan where plan_name='$pname' and architect_id='$aname' and cat_id='$catname' ");

                                        if (mysqli_num_rows($sql) <= 0) {   

                                        $result = mysqli_query($conn, "insert into tbl_plan(architect_id,cat_id,plan_name,price,description,no_of_visit,added_date_time,video_url,terms_con_file,type_id) values 
                                        ('$aname','$catname','$pname','$price','$dec','$visit','$date','$video','$pat' )") or die (mysqli_error($conn));

                                        if ($result == true) {
                                            //echo "inserted";
                            ?>
                                            <div class="alert alert-info mb-0" role="alert">
                                                plan Inserted!
                                            </div>
                                        <?php
                                        } else {
                                            // echo "error";
                                        ?>
                                            <div class="alert alert-warning mb-0" role="alert">
                                                Error!
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-warning mb-0" role="alert">
                                            plan Already Exits!
                                        </div>
                            <?php
                                    }
                                }
                                    
                                    
                                    ?>
                                     <form method="POST" enctype="multipart/form-data" id="frm">



                                        
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Architecture Name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="aid" id="aid">

                                                    <option value="">Select Architecture Name</option>
                                                    <?php
                                                    $count = "1";
                                                    $result = mysqli_query($conn, "select * from  tbl_architect") or die(mysqli_error($conn));

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row["architect_id"] ?>"><?php echo $row["name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">category Name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="cat" id="cat">

                                                    <option value="">Select category Name</option>
                                                    <?php
                                                    $count = "1";
                                                    $result = mysqli_query($conn, "select * from  tbl_category") or die(mysqli_error($conn));

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">property Name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="pat" id="pat">

                                                    <option value="">Select property Name</option>
                                                    <?php
                                                    $count = "1";
                                                    $result = mysqli_query($conn, "select * from  tbl_property") or die(mysqli_error($conn));

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row["type_id"] ?>"><?php echo $row["type_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Plan Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="pname" id="pname">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="price" id="price">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="dec" id="dec">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">No Of Visit</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="visit" id="visit">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">added date time</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" name="added" id="added">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Video url</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="video" id="video">
                                            </div>
                                        </div>
                                        
                                         




                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Plan</button>
                                            <a href="View_plan.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
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

    <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    aid: {
                        required: true
                    },
                    
                    cat: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    dec: {
                        required: true
                    },
                    visit:{
                        required:true
                    },
                    date:{
                        required:true
                    },
                    video:{
                        required:true
                    },
                    

                },

                messages: {

                    aid: {
                        required: "Please select architect"
                    },
                    
                     
                    cat: {
                        required: "please select category "
                    },
                    name: {
                        required: "please enter the plan name"
                    },
                    price: {
                        required: "please enter the plan price"
                    },
                    dec: {
                        required: "please enter the descripition"
                    },
                    visit:{
                        required:"please enter the number of visit"
                    },
                    date:{
                        required:"please select the date"
                    },
                    video:{
                        required:"please enter the video url"
                    },
                    
                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>