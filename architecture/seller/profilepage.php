<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Profile</title>
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

                    <!-- end page title -->


                    <!-- end card -->



                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Personal Information</h4>
                        

                             

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                                <tbody>

                                    <?php

                                    $id = $_SESSION["sellerid"];
                                    // echo $id;


                                    $sql = mysqli_query($conn, "select * from tbl_seller  as s left join tbl_city as c on c.city_id=s.city_id where seller_id='$id'");

                                    $row = mysqli_fetch_assoc($sql);

                                    // 
                                    ?>

                                    <tr>
                                        <th> Name</th>
                                        <td><?php echo $row["name"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>city name</th>
                                        <td><?php echo $row["city_name"] ?></td>
                                    </tr>
                                     
                                    <tr>
                                        <th>shop_name</th>
                                        <td><?php echo $row["shop_name"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>contact</th>
                                        <td><?php echo $row["contact"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>email</th>
                                        <td><?php echo $row["email"] ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th>isverify</th>
                                        <td><?php echo $row["isverify"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>isblock</th>
                                        <td><?php echo $row["isblock"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>isapprove</th>
                                        <td><?php echo $row["isapprove"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>cover_photo</th>
                                        <!-- <td><?php echo $row["cover_photo"] ?></td> -->
                                        <td><img height="100px" src="../architecture/admin/uploads/architect/<?php echo $row["cover_photo"] ?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>logo</th>
                                        <td><?php echo $row["logo"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>website_url</th>
                                        <td><?php echo $row["website_url"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>gst_no</th>
                                        <td><?php echo $row["gst_no"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>address_proof</th>
                                        <td><?php echo $row["address_proof"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>gst_certi_photo</th>
                                        <td><?php echo $row["gst_certi_photo"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>regi_datetime</th>
                                        <td><?php echo $row["regi_datetime"] ?></td>
                                    </tr>
                                     
                                    <tr>
                                        <th>facebook_page</th>
                                        <td><?php echo $row["facebook_page"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>insta_id</th>
                                        <td><?php echo $row["insta_id"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>address</th>
                                        <td><?php echo $row["address"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>landmark</th>
                                        <td><?php echo $row["landmark"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>pincode</th>
                                        <td><?php echo $row["pincode"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>lattitude</th>
                                        <td><?php echo $row["lattitude"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>longtitude</th>
                                        <td><?php echo $row["longtitude"] ?></td>
                                    </tr>
                                     
                                    



                                </tbody>
                            </table>
                            
                            <a href="Update_profile.php" type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update Profile</a>

<a href="dashboard.php" type="button" class="btn btn-danger waves-effect waves-light">Back</a>



                        </div>
                    </div>
                    <!-- end card -->


                    <!-- end card -->
                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php include('footer.php') ?> 
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