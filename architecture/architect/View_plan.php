<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View Plan</title>
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
                                <h4 class="mb-sm-0 font-size-18">View Plan</h4>

                                <!-- <div class="page-title-right">
                                <a type="submit" href="Add_plan.php"  class="btn btn-primary waves-effect waves-light">Add</a>
                                </div> -->

                                <a href="Add_plan.php" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Plan
                                </a>

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
                                                <th>architect name</th>
                                                <th>category name</th>
                                                <th>name</th>
                                                <th>price</th>
                                                <!-- <th>description</th> -->
                                                <!-- <th>number of visit</th> -->
                                                <th>isactive</th>
                                                <th>isapprove</th>
                                                <!-- <th>added date & time</th> -->
                                                <!-- <th>video url</th> -->
                                                <!-- <th>terms and conditions file</th> -->
                                                <th>action</th>
                                            </tr>
                                        </thead>

                                        <?php

if (isset($_POST["btnactive"])) {


    $id = $_POST["dataid"];
    $data = $_POST["isactive"];


    $result = mysqli_query($conn, "update tbl_plan set isactive='$data' where plan_id='$id'");


    //echo $id . $data;
}
?>

<?php

                                        if (isset($_POST["btnapproved"])) {


                                            $id = $_POST["dataid"];
                                            $data = $_POST["isapproved"];


                                            $result = mysqli_query($conn, "update tbl_plan set isapprove='$data' where plan_id='$id'");


                                            //echo $id . $data;
                                        }
                                        ?>


                                        <tbody>
                                            <?php
                                            $count = "1";
                                            $result = mysqli_query($conn, "select * from tbl_plan as p left join tbl_category as c on c.cat_id=p.cat_id left join tbl_architect as a on a.architect_id =p.architect_id") or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_assoc($result)) {



                                            ?>
                                                <tr>
                                                    <th><?php echo $count;
                                                        $count++ ?></th>
                                                    <th><?php echo $row["name"] ?></th>
                                                    <th><?php echo $row["cat_name"] ?></th>
                                                    <th><?php echo $row["plan_name"] ?></th>
                                                    <th><?php echo $row["price"] ?></th>
                                                    <!-- <th><?php echo $row["description"] ?></th> -->
                                                    <!-- <th><?php echo $row["no_of_visit"] ?></th> -->
                                                    <!-- <th><?php echo $row["isactive"] ?></th> -->

                                                    <!-- for isactive -->

                                                    <td>
                                                        <?php
                                                        if ($row["isactive"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnactive" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isactive" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["plan_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnactive" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isactive" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["plan_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    <!-- <th><?php echo $row["isapprove"] ?></th> -->

                                                    <!-- for isapproved -->

                                                    <td>
                                                        <?php
                                                        if ($row["isapprove"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnapproved" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isapproved" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["plan_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnapproved" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isapproved" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["plan_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    <!-- <th><?php echo $row["added_date_time"] ?></th> -->
                                                    <!-- <th><?php echo $row["video_url"] ?></th> -->
                                                    <!-- <th><?php echo $row["terms_con_file"] ?></th> -->
                                                    <td>


                                                        <a href="Viewdata_plan.php?viewid=<?php echo $row["plan_id"] ?>" type="submit" name="btnsubmit" class="btn btn-success waves-effect waves-light">View</a>


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