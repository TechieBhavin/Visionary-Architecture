<?php include 'session.php' ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>View sellers</title>
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
                                <h4 class="mb-sm-0 font-size-18">View sellers</h4>

                                <!-- <div class="page-title-right">
                                    <a type="submit" href="Add_sellers.php" class="btn btn-primary waves-effect waves-light">Add</a>
                                </div> -->

                                <a href="Add_sellers.php" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add Seller
                                </a>


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

                                        $result = mysqli_query($conn, "delete from tbl_seller where seller_id='$id'");
                                        echo "<script>window.location='View_sellers.php'</script>";
                                    }
                                    ?>



                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>city name</th>
                                                <th>name</th>
                                                <th>shop name</th>
                                                <!-- <th>contact number</th>
                                                <th>e-mail</th>
                                                <th>password</th>
                                                <th>otp</th> -->
                                                <th>isverify</th>
                                                <th>isblock</th>
                                               
                                                <!-- <th>cover photo</th>
                                                <th>logo</th>
                                                <th>website url</th>
                                                <th>gst number</th>
                                                <th>address proof</th>
                                                <th>gst certificate photo</th>
                                                <th>register date & time</th>
                                                <th>about</th>
                                                <th>facebook page</th>
                                                <th>instagram page / id</th>
                                                <th>address</th>
                                                <th>landmark</th>
                                                <th>pincode</th>
                                                <th>lattitude</th>
                                                <th>longtitude</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        if (isset($_POST["btnverify"])) {


                                            $id = $_POST["dataid"];
                                            $data = $_POST["isverify"];


                                            $result = mysqli_query($conn, "update tbl_seller set isverify='$data' where seller_id='$id'");


                                            //echo $id . $data;
                                        }
                                        ?>
                                        <?php

                                        if (isset($_POST["btnblocked"])) {


                                            $id = $_POST["dataid"];
                                            $data = $_POST["isblock"];


                                            $result = mysqli_query($conn, "update tbl_seller set isblock='$data' where seller_id='$id'");


                                            //echo $id . $data;
                                        }
                                        ?>
                                         


                                        <tbody>

                                            <?php
                                            $count = "1";
                                            $result = mysqli_query($conn, "select * from  tbl_seller as s left join tbl_city as c on c.city_id=s.city_id") or die(mysqli_error($conn));

                                            while ($row = mysqli_fetch_assoc($result)) {



                                            ?>
                                                <tr>
                                                    <td><?php echo $count;
                                                        $count++ ?></td>
                                                    <td><?php echo $row["city_name"] ?></td>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><?php echo $row["shop_name"] ?></td>
                                                    <!-- <td><?php echo $row["contact"] ?></td>
                                                <td><?php echo $row["email"] ?></td>
                                                <td><?php echo $row["password"] ?></td>
                                                <td><?php echo $row["otp"] ?></td> -->
                                                    <!-- <td><?php echo $row["isverify"] ?></td> -->

                                                    <!-- for isverify -->

                                                    <td>

                                                        <?php

                                                        if ($row["isverify"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnverify" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isverify" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["seller_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnverify" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isverify" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["seller_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>


                                                    </td>

                                                    <!-- <td><?php echo $row["isblock"] ?></td> -->

                                                    <!-- for isblocked -->

                                                    <td>

                                                        <?php



                                                        if ($row["isblock"] == "yes") {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnblocked" class="btn btn-primary">Yes</button>
                                                                <input type="hidden" name="isblock" value="no">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["seller_id"] ?>">
                                                            </form>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <form method="post">
                                                                <button type="submit" name="btnblocked" class="btn btn-danger">No</button>
                                                                <input type="hidden" name="isblock" value="yes">
                                                                <input type="hidden" name="dataid" value="<?php echo $row["seller_id"] ?>">
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>


                                                    </td>
                                                    <!-- <td><?php echo $row["isapprove"] ?></td> -->

                                                    <!-- for isapproved -->

                                                   
                                                    <!-- <td><img height="100px" src="uploads/seller/cover photo/<?php echo $row["cover_photo"] ?>" alt=""></td>
                                                <td><img height="100px" src="uploads/seller/logo/<?php echo $row["logo"] ?>" alt=""></td>
                                                <td><?php echo $row["website_url"] ?></td>
                                                <td><?php echo $row["gst_no"] ?></td>
                                                <td><?php echo $row["address_proof"] ?></td>
                                                <td><img height="100px" src="uploads/seller/gst certificate photo/<?php echo $row["gst_certi_photo"] ?>" alt=""></td>
                                                <td><?php echo $row["regi_datetime"] ?></td>
                                                <td><?php echo $row["about"] ?></td>
                                                <td><?php echo $row["facebook_page"] ?></td>
                                                <td><?php echo $row["insta_id"] ?></td>
                                                <td><?php echo $row["address"] ?></td>
                                                <td><?php echo $row["landmark"] ?></td>
                                                <td><?php echo $row["pincode"] ?></td>
                                                <td><?php echo $row["lattitude"] ?></td>
                                                <td><?php echo $row["longtitude"] ?></td> -->


                                                    <td>
                                                        <!-- <a href="Update_seller.php?updateid=<?php echo $row["seller_id"] ?>" type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Edit</a> -->
                                                        <a href="Viewdata_seller.php?viewid=<?php echo $row["seller_id"] ?>" type="submit" name="btnsubmit" class="btn btn-success waves-effect waves-light">View</a>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light delete-btn" delete-id="<?php echo $row["seller_id"] ?>" data-bs-toggle="modal" data-bs-target="#myModal">Delete </button>
                                                    </td>

                                                    <!-- <td>
                                                        <div class="d-flex justify-content align-items-center">

                                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="Update_seller.php?updateid=<?php echo $row["seller_id"] ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mx-4" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                            <a class="badge bg-danger " data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="delete-btn" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-toggle="modal" data-target="#exampleModal" name="btnsubmit" id="btnsubmit" delete-id="<?php echo $row["seller_id"] ?>">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </a>
                                                            <a href="Viewdata_seller.php?viewid=<?php echo $row["seller_id"] ?>" type="submit" name="btnsubmit" class="btn btn-success waves-effect waves-light">View</a>
                                                        </div>
                                                    </td> -->
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