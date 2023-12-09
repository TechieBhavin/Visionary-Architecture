<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View users</title>
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
                                <h4 class="mb-sm-0 font-size-18">View users</h4>



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
                                                        <!-- <input type="text" id="deleteimage" name="deleteimage"> -->
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
                                        // $image = $_POST["deleteimage"];

                                        // unlink("uploads/category/" . $image);


                                        //  echo $id;

                                        $result = mysqli_query($conn, "delete from tbl_user where user_id='$id'");
                                        echo "<script>window.location='View_users.php'</script>";
                                    }
                                    ?>



                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>name</th>
                                                <th>contact number</th>
                                                <th>e-mail</th>
                                                <!-- <th>password</th> -->
                                                <th>isverify</th>
                                                <th>isblock</th>
                                                <!-- <th>otp</th>
                                               
                                                <th>register date & time</th> -->
                                                <th>action</th>
                                            </tr>
                                        </thead>

                                        <?php

if (isset($_POST["btnverify"])) {


    $id = $_POST["dataid"];
    $data = $_POST["isverify"];


    $result = mysqli_query($conn, "update tbl_user set isverify='$data' where user_id='$id'");


    //echo $id . $data;
}
?>
 <?php

if (isset($_POST["btnblocked"])) {


    $id = $_POST["dataid"];
    $data = $_POST["isblock"];


    $result = mysqli_query($conn, "update tbl_user set isblock='$data' where user_id='$id'");


    //echo $id . $data;
}
?>


                                        <tbody>
                                            <?php
                                            $count = "1";
                                            $result = mysqli_query($conn, "select * from tbl_user") or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_assoc($result)) {



                                            ?>
                                                <tr>
                                                    <th><?php echo $count;
                                                        $count++ ?></th>
                                                    <th><?php echo $row["name"] ?></th>
                                                    <th><?php echo $row["contact"] ?></th>
                                                    <th><?php echo $row["email"] ?></th>
                                                    <!-- <th><?php echo $row["password"] ?></th> -->
                                                    <!-- <th><?php echo $row["isverify"] ?></th> -->

                                                    <!-- for isverify -->

                                                    <td>

                                                        <?php

                                                        if ($row["isverify"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnverify" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isverify" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["user_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnverify" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isverify" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["user_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>


                                                    </td>
                                                    <!-- <th><?php echo $row["isblock"] ?></th> -->
                                                    <!-- for isblocked -->

                                                    <td>

                                                        <?php



                                                        if ($row["isblock"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnblocked" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isblock" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["user_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnblocked" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isblock" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["user_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>


                                                    </td>

                                                    <!-- <th><?php echo $row["otp"] ?></th>
                                                    <th><?php echo $row["regi_date_time"] ?></th> -->

                                                    <td>


                                                        <a href="Viewdata_user.php?viewid=<?php echo $row["user_id"] ?>" type="submit" name="btnsubmit" class="btn btn-success waves-effect waves-light">View</a>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light delete-btn" delete-id="<?php echo $row["user_id"] ?>" data-bs-toggle="modal" data-bs-target="#myModal">Delete </button>

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
                var id = $(this).attr("delete-id");
                // var imagedata = $(this).attr("delete-image");

                // alert(id);

                $("#deleteid").val(id);
                // $("#deleteimage").val(imagedata);


            })

            // $(".delete-btn").click(function(){
            //     // alert("delete");

            //     var id = $(this).attr("delete-id");

            //     // alert(id);

            //     $("#deleteid").val(id);

            // });
        });
    </script>

</body>

<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

</html>