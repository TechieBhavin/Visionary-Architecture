<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View product data</title>
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
                                <h4 class="mb-sm-0 font-size-18">View product data</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_products.php" class="btn btn-primary waves-effect waves-light">Back</a>
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

                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">



                                        <tbody>

                                            <?php

                                            if (isset($_GET["viewid"])) {
                                                $id = $_GET["viewid"];
                                                // echo $id;

                                                $result = mysqli_query($conn, "select *,p.title as vtitle,p.description as vdescription,p.price as vprice,p.img1 as vimg1,p.img2 as vimg2,p.img3 as vimg3,p.isactive as visactive,p.isapprove as visapprove,p.isblocked as visblocked from tbl_product as p left join tbl_subcategory as c on c.subcat_id=p.subcat_id left join tbl_seller as s on s.seller_id=p.seller_id left join tbl_brand as b on b.bid=p.bid where pid='$id'");
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            ?>

                                            <tr>
                                                <th>product id</th>
                                                <td><?php echo $row["pid"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>seller name</th>
                                                <td><?php echo $row["name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>sub category name</th>
                                                <td><?php echo $row["subcat_name"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>brand name</th>
                                                <td><?php echo $row["bname"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>title</th>
                                                <td><?php echo $row["title"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>description</th>
                                                <td><?php echo $row["description"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>price</th>
                                                <td><?php echo $row["price"] ?></td>
                                            </tr>
                                            <tr>
                                                <th>img1</th>
                                                <td><img height="100px" src="uploads/product/<?php echo $row["vimg1"] ?>" alt=""></td>
                                            </tr>
                                            <tr>
                                                <th>img2</th>
                                                <td><img height="100px" src="uploads/product/<?php echo $row["vimg2"] ?>" alt=""></td>
                                            </tr>
                                            <tr>
                                                <th>img3</th>
                                                <td><img height="100px" src="uploads/product/<?php echo $row["vimg3"] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                                <th>video_url</th>
                                                <td><?php echo $row["video_url"] ?></td>
                                        </tr>
                                        <tr>
                                                <th>product_type</th>
                                                <td><?php echo $row["product_type"] ?></td>
                                        </tr>
                                        <tr>
                                                <th>isactive</th>
                                                <td><?php echo $row["visactive"] ?></td>
                                        </tr>
                                        <tr>
                                                <th>isapprove</th>
                                                <td><?php echo $row["visapprove"] ?></td>
                                        </tr>
                                        <tr>
                                                <th>isblocked</th>
                                                <td><?php echo $row["visblocked"] ?></td>
                                        </tr>






                                        </tbody>
                                    </table>



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







</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>