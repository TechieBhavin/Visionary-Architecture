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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Personal Information</h4>

                                <a href="dashboard.php" class="btn btn-primary btn-sm d-flex align-items-center justify-content-between">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2">Back</span>
                    </a>




                            </div>
                        </div>
                         
                    </div>

                    <!-- start page title -->

                    <!-- end page title -->
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                                <tbody>

                                    <?php

                                    $id = $_SESSION["architectid"];
                                    // echo $id;


                                    $sql = mysqli_query($conn, "select * from tbl_architect as a left join tbl_city as c on c.city_id=a.city_id where architect_id='$id'");

                                    $row = mysqli_fetch_assoc($sql);

                                    // 
                                    ?>

                                    <tr>
                                        <th>architect Name</th>
                                        <td><?php echo $row["name"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>contact</th>
                                        <td><?php echo $row["contact"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>city name</th>
                                        <td><?php echo $row["city_name"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>email</th>
                                        <td><?php echo $row["email"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>profile_photo</th>
                                        <!-- <td><?php echo $row["profile_photo"] ?></td> -->
                                        <td><img height="100px" src="../architecture/admin/uploads/architect/<?php echo $row["profile_photo"] ?>" alt=""></td>
                                    </tr>
                                    <!-- <tr>
                                        <th>gender</th>
                                        <td><?php echo $row["gender"] ?></td>
                                    </tr> -->
                                    <tr>
                                        <th>firm_name</th>
                                        <td><?php echo $row["firm_name"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>firm_contact</th>
                                        <td><?php echo $row["firm_contact"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>firm_mail</th>
                                        <td><?php echo $row["firm_mail"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>website</th>
                                        <td><?php echo $row["website"] ?></td>
                                    </tr>

                                    
                                    <tr>
                                        <th>isverify</th>
                                        <td><?php echo $row["isverify"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>addhar_card_photo</th>
                                        <td><?php echo $row["addhar_card_photo"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>addhar_card_number</th>
                                        <td><?php echo $row["addhar_card_number"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>qualification</th>
                                        <td><?php echo $row["qualification"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>experience</th>
                                        <td><?php echo $row["experience"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>specialization</th>
                                        <td><?php echo $row["specialization"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>certificate_photo</th>
                                        <td><?php echo $row["certificate_photo"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>certificate_name</th>
                                        <td><?php echo $row["certificate_name"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>regi_date_time</th>
                                        <td><?php echo $row["regi_date_time"] ?></td>
                                    </tr>

                                    <tr>
                                        <th>isblocked</th>
                                        <td><?php echo $row["isblocked"] ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>cover_photo</th>
                                        <!-- <td><?php echo $row["cover_photo"] ?></td> -->
                                        <!-- <td><img height="100px" src="/admin/uploads/architect/ <?php echo $row["cover_photo"] ?>" alt=""></td> -->
                                        <td><img height="100px" src="../admin/uploads/architect/<?php echo $row["cover_photo"] ?>" alt=""></td>
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
                                    <tr>
                                        <th>about_us</th>
                                        <td><?php echo $row["about_us"] ?></td>
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