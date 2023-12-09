<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View offers</title>
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
                                <h4 class="mb-sm-0 font-size-18">View offers</h4>

                                 

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">warning</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Are u sure you want to delete?</h5>

                                                </div>
                                                <div class="modal-footer">
                                                <form method="POST">
                                                        <input type="hidden" id="deleteid" name="deleteid">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" name="btndelete" class="btn btn-primary waves-effect waves-light">Yes</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>

                                    <?php
                                    if (isset($_POST["btndelete"])) {
                                        // echo "delete";
                                        $id = $_POST["deleteid"];

                                        // echo $id;

                                        $result = mysqli_query($conn, "delete from tbl_offers where oid = '$id'");
                                        echo "<script>window.location='View_offers.php'</script>";
                                    }
                                    ?>



                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Discription</th>
                                                <!-- <th>Img url</th> -->
                                                
                                                <th>Maximize</th>
                                                <th>Minimize</th>
                                                <!-- <th>Discount</th>
                                                <th>Coupn code</th> -->
                                                <th>Isactive</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <?php

if (isset($_POST["btnactive"])) {


    $id = $_POST["dataid"];
    $data = $_POST["isactive"];


    $result = mysqli_query($conn, "update tbl_offers set isactive='$data' where oid='$id'");


    //echo $id . $data;
}
?>


                                        <tbody>

                                            <?php 
                                                $count = "1";
                                                $result = mysqli_query($conn,"select * from tbl_offers") or die ( mysqli_error($conn));

                                                while($row = mysqli_fetch_assoc($result)){

                                                

                                            ?>

                                            <tr>
                                                <td><?php echo $count; $count++ ?></td>
                                                <td><?php echo $row["title"] ?></td>
                                                <td><?php echo $row["description"] ?></td>
                                                <!-- <td><?php echo $row["img_url"] ?></td> -->
                                                
                                                <td><?php echo $row["max_value"] ?></td>
                                                <td><?php echo $row["min_value"] ?></td>
                                                <!-- <td><?php echo $row["discount"] ?></td>
                                                <td><?php echo $row["coupon_code"] ?></td> -->
                                                <!-- <td><?php echo $row["isactive"] ?></td> -->

                                                <td>
                                                        <?php
                                                        if ($row["isactive"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnactive" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isactive" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["oid"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnactive" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isactive" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["oid"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                
                                                <!-- <td>
                                                <a href="Update_offer.php?updateid=<?php echo $row["oid"] ?>" type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Edit</a>
                                                <a href="Viewdata_offer.php?viewid=<?php echo $row["oid"] ?>"  name="btnsubmit" type="submit" class="btn btn-success waves-effect waves-light">View</a>
                                                <button type="button" class="btn btn-danger waves-effect waves-light delete-btn" delete-id="<?php echo $row["oid"] ?>" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button>
                                                </td> -->

                                                <td>
                                                        <div class="d-flex justify-content align-items-center">

                                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="Update_offer.php?updateid=<?php echo $row["oid"] ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mx-4" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                            <a class="badge bg-danger " data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="delete-btn" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-toggle="modal" data-target="#exampleModal" name="btnsubmit" id="btnsubmit" delete-id="<?php echo $row["oid"] ?>">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </a>
                                                            <a href="Viewdata_offer.php?viewid=<?php echo $row["oid"] ?>"  name="btnsubmit" type="submit" class="btn btn-success waves-effect waves-light">View</a>
                                                        </div>
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