<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update variation</title>
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
                                <h4 class="mb-sm-0 font-size-18">Update variation</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_variations.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                        $product = $_POST["product"];
                                        $price = $_POST["price"];
                                        // $img1 = "abc.png";
                                        // $img2 = "abc,png";
                                        // $img3 = "apb.png";
                                        $isactive = $_POST["active"];
                                        $des = $_POST["dec"];
                                        $id = $_GET["updateid"];
                                       

                                        $oldimage1 = $_POST["oldtextimage1"];
                                        $newimage1 = "";

                                        $oldimage2 = $_POST["oldtextimage2"];
                                        $newimage2 = "";

                                        $oldimage3 = $_POST["oldtextimage3"];
                                        $newimage3 = "";


                                        if (empty($_FILES["img1"]["name"])) {
                                            $newimage1 = $oldimage1;
                                        } else {
                                            unlink("uploads/variation/" . $oldimage1);


                                            $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
                                            $filename1 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img1"]["tmp_name"], "uploads/variation/" . $filename1);
                                            $newimage1 = $filename1;
                                        }

                                        if (empty($_FILES["img2"]["name"])) {
                                            $newimage2 = $oldimage2;
                                        } else {
                                            unlink("uploads/variation/" . $oldimage2);


                                            $ext = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
                                            $filename2 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img2"]["tmp_name"], "uploads/variation/" . $filename2);
                                            $newimage2 = $filename2;
                                        }

                                        if (empty($_FILES["img3"]["name"])) {
                                            $newimage3 = $oldimage3;
                                        } else {
                                            unlink("uploads/variation/" . $oldimage3);


                                            $ext = pathinfo($_FILES["img3"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img3"]["tmp_name"], "uploads/variation/" . $filename3);
                                            $newimage3 = $filename3;
                                        }

                                        $result = mysqli_query($conn, "update tbl_variations set pid='$product',price='$price',img1='$newimage1',img2='$newimage2',img3='$newimage3',description='$des',isactive='$isactive' where var_id='$id'") or die(mysqli_errno($conn));

                                        if ($result == true) {

                                            echo "<script>window.location='View_variations.php'</script>";
                                        } else {
                                    ?>
                                            <div class="alert alert-warning mb-0" role="alert">
                                                Error!
                                            </div>
                                        <?php
                                        }
                                    }  
                                    ?>

                                    <?php

                                    if (isset($_GET["updateid"])) {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn, "select * from tbl_variations where var_id='$id'");
                                        while ($row = mysqli_fetch_assoc($result)) {

                                    ?>


                                            <form method="POST" enctype="multipart/form-data" id="frm">
                                                <div class="mb-3 row">
                                                    <label for="example-search-input" class="col-md-2 col-form-label">product Name</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="product" id="product">

                                                            <option value="">Select product Name</option>
                                                            <?php
                                                            $count = "1";
                                                            $result = mysqli_query($conn, "select * from  tbl_product") or die(mysqli_error($conn));

                                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                <!-- <option value="<?php echo $row["pid"] ?>"><?php echo $row["title"] ?></option> -->

                                                                <option <?php if ($row1["pid"] == $row["pid"]) { ?> selected <?php } ?> value=" <?php echo $row1["pid"] ?>"><?php echo $row1["title"] ?></option>
                                                            <?php
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" value="<?php echo $row["price"] ?>" name="price" id="price">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Img1</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" value="<?php echo $row["img1"] ?>" name="img1" id="img1">
                                                        <img height="100px" width="100px" src="uploads/variation/<?php echo $row["img1"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["img1"] ?>" type="hidden" name="oldtextimage1" id="img1">
                                                </div>


                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Img2</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" value="<?php echo $row["img2"] ?>" name="img2" id="img2">
                                                        <img height="100px" width="100px" src="uploads/variation/<?php echo $row["img2"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["img2"] ?>" type="hidden" name="oldtextimage2" id="img2">
                                                </div>


                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Img3</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" value="<?php echo $row["img3"] ?>" name="img3" id="img3">
                                                        <img height="100px" width="100px" src="uploads/variation/<?php echo $row["img3"] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" value="<?php echo $row["img3"] ?>" type="hidden" name="oldtextimage3" id="img3">
                                                </div>

                                                <div class="col-xl-3 col-sm-6">
                                                    <div class="mt-4">
                                                        <h5 class="font-size-14 mb-4">IsActive</h5>
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input" value="yes" <?php if ($row["isactive"] == "yes") { ?> checked <?php } ?> type="radio" name="active" id="active" checked>
                                                            <label class="form-check-label" for="formRadios1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="no" <?php if ($row["isactive"] == "no") { ?> checked <?php } ?> type="radio" name="active" id="active">
                                                            <label class="form-check-label" for="formRadios2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" value="<?php echo $row["description"] ?>" name="dec" id="dec">
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update variation</button>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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





</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>