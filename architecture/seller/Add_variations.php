<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Add Variations</title>
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
                                <h4 class="mb-sm-0 font-size-18">Add Variations</h4>

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

                                    if(isset($_POST["btnsubmit"])){

                                        //echo "inserted";

                                        $product = $_POST["product"];
                                        $price = $_POST["price"];
                                        // $img1 = "abc.png";
                                        // $img2 = "abc,png";
                                        // $img3 = "apb.png";
                                        $isactive = $_POST["active"];
                                        $des = $_POST["dec"];

                                        $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
                                            $filename1 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img1"]["tmp_name"], "uploads/variation/" . $filename1);

                                            $ext = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
                                            $filename2 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img2"]["tmp_name"], "uploads/variation/" . $filename2);

                                            $ext = pathinfo($_FILES["img3"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . random_int(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["img3"]["tmp_name"], "uploads/variation/" . $filename3);


                                  

                                        $result = mysqli_query($conn, "insert into tbl_variations(pid,price,img1,img2,img3,description,isactive) values ('$product'
                                        ,'$price','$filename1','$filename2','$filename3','$des','$isactive')") or die (mysqli_error($conn));

                                        if ($result == true) {
                                            //echo "inserted";
                                ?>
                                            <div class="alert alert-info mb-0" role="alert">
                                                variation Inserted!
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
                                    }  
                                
                                    
                                    
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

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row["pid"] ?>"><?php echo $row["title"] ?></option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="price" id="price">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Img1</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="img1" id="img1">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Img2</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="img2" id="img2">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Img3</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="img3" id="img3">
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
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="dec" id="dec">
                                            </div>
                                        </div>
                                         




                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Variations</button>
                                            <a href="View_variations.php" type="button" class="btn btn-danger waves-effect waves-light">Cancel</a>
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
                    product: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    img1: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    img2: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                    img3: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"

                    },
                    dec: {
                        required: true
                    },
                    

                },

                messages: {

                    product: {
                        required: "Please select any city"
                    },
                    price: {
                        required: "Please enter name"
                    },
                    img1: {
                        required: "Please Select Photo",
                        accept: 'This is not an image!'
                    },
                    img2: {
                        required: "Please Select Photo",
                        accept: 'This is not an image!'
                    },
                    img3: {
                        required: "Please Select Photo",
                        accept: 'This is not an image!'
                    },
                    dec: {
                        required: "please enter the firm name"
                    },
                    
                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>