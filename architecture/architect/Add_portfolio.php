<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add Portfolio</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add Portfolio</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_All_Portfolio.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                        //echo "inserted";

                                        $cat = $_POST["cat"];
                                        $aid = $_POST["aid"];
                                        $city = $_POST["city"];
                                        $title = $_POST["title"];
                                        // $cover = "xyz.png";
                                        
                                        // $active = $_POST["active"];
                                        
                                        $address = $_POST["address"];
                                        $landmark = $_POST["landmark"];
                                        $pincode = $_POST["pincode"];
                                        $lattitude = $_POST["lattitude"];
                                        $longtitude = $_POST["longtitude"];
                                        $start = $_POST["start"];
                                        $end = $_POST["end"];
                                        $about = $_POST["about"];

                                        // echo "inserted";

                                        $ext = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
                                        $filename = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                        move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/portfolioimage/" . $filename);

                                        $sql = mysqli_query($conn, "select * from tbl_portfolio where title='$title' and cat_id='$cat' and architect_id='$aid' and city_id='$city' ");

                                        if (mysqli_num_rows($sql) <= 0) {


                                            $result = mysqli_query($conn, "insert into tbl_portfolio(cat_id,architect_id,city_id,title,cover_image,address,landmark,pincode,lattitude,longtitude,start_date,end_date,about_us) values 
                                        ('$cat','$aid','$city','$title','$filename', '$address','$landmark','$pincode','$lattitude','$longtitude','$start','$end','$about')") or die(mysqli_error($conn));

                                            if ($result == true) {
                                                //echo "inserted";
                                    ?>
                                                <div class="alert alert-info mb-0" role="alert">
                                                    portfolio Inserted!
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
                                                portfolio Already Exits!
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>
                                    <form method="POST" enctype="multipart/form-data" id="frm">




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
                                            <label for="example-search-input" class="col-md-2 col-form-label">Architact Name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="aid" id="aid">

                                                    <option value="">Select architect Name</option>
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
                                            <label for="example-search-input" class="col-md-2 col-form-label">City Name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="city" id="city">

                                                    <option value="">Select City Name</option>
                                                    <?php
                                                    $count = "1";
                                                    $result = mysqli_query($conn, "select * from  tbl_city") or die(mysqli_error($conn));

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
                                            <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title" id="title">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Cover Image</label>
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
                                            <label for="example-text-input" class="col-md-2 col-form-label">Start date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" name="start" id="start">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">End date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" name="end" id="end">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">About us</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="about" id="about">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Portfolio</button>
                                            <a href="View_All_Portfolio.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
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

    <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    aid: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    cat: {
                        required: true
                    },
                    cover: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    video: {
                        required: true,

                    },
                    address: {
                        required: true,
                    },
                    landmark: {
                        required: true,
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
                    start: {
                        required: true
                    },
                    end: {
                        required: true
                    },
                    about: {
                        required: true
                    }



                },

                messages: {

                    aid: {
                        required: "Please select architect name"
                    },
                    city: {
                        required: "please select city name"
                    },
                    title: {
                        required: "please enter the title"
                    },
                    cat: {
                        required: "please select the city"
                    },
                    cover: {
                        required: "please select image",
                        accept: 'This is not an image!'
                    },
                    video: {
                        required: "please select the video url",
                        accept: 'This is not valid video url!'
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
                    start: {
                        required: "please enter the start date"
                    },
                    end: {
                        required: "please enter the end date"
                    },
                    about: {
                        required: "please enter about us"
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