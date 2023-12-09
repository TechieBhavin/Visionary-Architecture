<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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
                                <h4 class="mb-sm-0 font-size-18">View orders</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">





                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>user name</th>
                                                <th>city name</th>
                                                <th>offer id</th>
                                                <!-- <th>address</th>
                                                <th>landmark</th>
                                                <th>pincode</th> -->
                                                <th>total payment</th>
                                                <!-- <th>discount</th> -->
                                                <th>ispay</th>
                                                <!-- <th>payment mode</th>
                                                <th>transection number</th>
                                                <th>status</th> -->
                                                <!-- <th>order date & time</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <?php

                                        if (isset($_POST["btnispay"])) {


                                            $id = $_POST["dataid"];
                                            $data = $_POST["ispay"];


                                            $result = mysqli_query($conn, "update tbl_order set ispay='$data' where order_id='$id'");


                                            //echo $id . $data;
                                        }
                                        ?>


                                        <tbody>

                                            <?php
                                            $count = "1";
                                            $result = mysqli_query($conn, "select * from tbl_order as o left join tbl_user as u on u.user_id=o.user_id left join tbl_city as c on c.city_id=o.city_id where status = 'pending'" ) or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_assoc($result)) {



                                            ?>

                                                <tr>
                                                    <td><?php echo $count;
                                                        $count++ ?></td>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><?php echo $row["city_name"] ?></td>
                                                    <td><?php echo $row["oid"] ?></td>
                                                    <!-- <td><?php echo $row["address"] ?></td>
                                                <td><?php echo $row["landmark"] ?></td>
                                                <td><?php echo $row["pincode"] ?></td> -->
                                                    <td><?php echo $row["total_payment"] ?></td>
                                                    <!-- <td><?php echo $row["discount"] ?></td> -->
                                                    <!-- <td><?php echo $row["ispay"] ?></td> -->

                                                    <td>

                                                        <?php



                                                        if ($row["ispay"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnispay" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="ispay" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["order_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnispay" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="ispay" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["order_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>


                                                    </td>


                                                    <!-- <td><?php echo $row["pay_mode"] ?></td>
                                                <td><?php echo $row["trans_no"] ?></td>
                                                <td><?php echo $row["status"] ?></td>
                                                <td><?php echo $row["order_datetime"] ?></td> -->


                                                    <td>

                                                        <a href="Viewdata_all_orders.php.?viewid=<?php echo $row["order_id"] ?>" type="submit" name="btnsubmit" class="btn btn-success waves-effect waves-light">View</a>

                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


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

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>


    <script>
        $(document).ready(function() {

            $(document).on('click', '.delete-btn', function() {
                // alert("delete");

                var id = $(this).attr("delete-id");

                // alert(id);

                $("#deleteid").val(id);

            });





        });
    </script>

</body>

<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

</html>