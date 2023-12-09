<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>update Articale</title>
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
                                <h4 class="mb-sm-0 font-size-18">update Articale</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_article.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                    if(isset($_POST["btnsubmit"]))
                                    {
                                        $id = $_GET["updateid"];
                                        $aid = $_POST["aid"];
                                        $img = $_POST["img"];
                                        $video = $_POST["video"];
                                        $title = $_POST["title"];
                                        $dec = $_POST["dec"];
                                        $web = $_POST["web"];
                                        $active = $_POST["active"];
                                        $date = $_POST["date"];

                                        $sql = mysqli_query($conn,"select * from tbl_articles where title='$title' ");

                                        if(mysqli_num_rows($sql) <=0)
                                        {

                                            $result = mysqli_query($conn, "update tbl_articles set architect_id='$aid',img_url='$img',video_url='$video',title='$title',description='$dec',ref_wed_url='$web',isactive='$active',article_datetime='$date' where article_id='$id'") or die(mysqli_errno($conn));
                                            if ($result == true) {

                                                echo "<script>window.location='View_article.php'</script>";
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
                                                article already exists !
                                            </div>
                                    <?php
                                        }
                                        }
    
                                        ?>
    
    


                                    <?php

                                    if (isset($_GET["updateid"])) {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn, "select * from tbl_articles where article_id='$id'");
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                            <form method="POST" enctype="multipart/form-data" id="frm">

                                                <div class="mb-3 row">
                                                    <label for="example-search-input" class="col-md-2 col-form-label">Architect Name</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="aid" id="aid">

                                                            <option value="">Select architect Name</option>
                                                            <?php
                                                            $count = "1";
                                                            $result = mysqli_query($conn, "select * from  tbl_architect") or die(mysqli_error($conn));

                                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                
                                                                <option <?php if ($row1["architect_id"] == $row["architect_id"]) { ?> selected <?php } ?> value=" <?php echo $row1["architect_id"] ?>"><?php echo $row1["name"] ?></option>
                                                            <?php
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Image url</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["img_url"] ?>" type="url" name="img" id="img">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Video url</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["video_url"] ?>" type="url" name="video" id="video">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["title"] ?>"  type="text" name="title" id="title">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["description"] ?>"  type="text" name="dec" id="dec">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Reference Website</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" value="<?php echo $row["ref_wed_url"] ?>"  type="text" name="web" id="web">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsActive</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" type="radio" name="active" id="active" checked>
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" type="radio" name="active" id="active">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Architect date time</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" name="date" id="date">
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">update Articale</button>
                                                    <a href="View_article.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                </div>
                                            </form>

                                    <?php
                                        }
                                    }
                                    ?>
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

    <!-- <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    aid: {
                        required: true
                    },
                    img: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    video: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    title: {
                        required: true
                    },
                    dec: {
                        required: true
                    },
                    web: {
                        required: true
                    },
                    date: {
                        required: true
                    },
                    

                },

                messages: {

                    aid: {
                        required: "Please select architect"
                    },
                    
                    img: {
                        required: "Please Select Photo",
                        accept: 'This is not an image!'
                    },
                    video: {
                        required: "Please Select Photo",
                        accept: 'This is not an video!'
                    },
                    title: {
                        required: "please enter the title"
                    },
                    dec: {
                        required: "please enter the description"
                    },
                    web: {
                        required: "please enter the reference"
                    },
                    date: {
                        required: "please enter the date"
                    },
                    
                }

            });


        });
    </script> -->



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>