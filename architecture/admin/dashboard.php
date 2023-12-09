<?php
session_start();

if (!isset($_SESSION["islogin"])) {
    echo "<script>window.location='login.php'</script>";
}
include 'connection.php'
?>



<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:31:35 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard</title>
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

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'header.php' ?>

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
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <div class="col-xl-12">
                            <div class="row">


                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">

                                            <?php
                                            $result = mysqli_query($conn, "select * from tbl_user");
                                            $row = mysqli_num_rows($result);
                                            ?>

                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Users</p>
                                                    <h4 class="mb-0"> <?php echo $row ?></h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-user font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">

                                            <?php
                                            $result = mysqli_query($conn, "select * from tbl_plan");
                                            $row = mysqli_num_rows($result);
                                            ?>

                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Plans</p>
                                                    <h4 class="mb-0"> <?php echo $row ?></h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-user font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">

                                            <?php
                                            $result = mysqli_query($conn, "select * from tbl_order");
                                            $row = mysqli_num_rows($result);
                                            ?>
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Orders</p>
                                                    <h4 class="mb-0"><?php echo $row ?></h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-basket font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">

                                            <?php
                                            $result = mysqli_query($conn, "select * from tbl_articles");
                                            $row = mysqli_num_rows($result);
                                            ?>

                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Articles</p>
                                                    <h4 class="mb-0"><?php echo $row ?></h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-comment-dots font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- end row -->


                        </div>
                    </div>
                    <!-- end row -->


                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Architectures</h4>
                                    <div class="table-responsive">

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

                                            //echo $id;

                                            $result = mysqli_query($conn, "delete from tbl_architect where architect_id='$id'");
                                            echo "<script>window.location='Viewarchitect.php'</script>";
                                        }
                                        ?>


                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>city Name</th>
                                                    <th>name</th>
                                                    <th>contact</th>
                                                    <th>E-mail</th>
                                                    <th>profile photo</th>

                                                    <th>firm name</th>
                                                    <th>firm contact</th>
                                                    <th>firm e-mail</th>
                                                    <th>website</th>

                                                    <th>isverify</th>
                                                    <th>addhar card photo</th>
                                                    <th>addhar card number</th>
                                                    <th>qualification</th>
                                                    <th>experience</th>
                                                    <th>specialization</th>
                                                    <th>certificate photo</th>
                                                    <th>certificate name</th>
                                                    <th>register date & time</th>
                                                    <th>isblocked</th>

                                                    <th>cover photo</th>
                                                    <th>address</th>
                                                    <th>landmark</th>
                                                    <th>pincode</th>
                                                    <th>lattitude</th>
                                                    <th>longitude</th>
                                                    <th>about us</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $count = "1";
                                                $result = mysqli_query($conn, "select * from  tbl_architect as a left join tbl_city as c on c.city_id=a.city_id") or die(mysqli_error($conn));

                                                while ($row = mysqli_fetch_assoc($result)) {



                                                ?>
                                                    <tr>
                                                        <th><?php echo $count;
                                                            $count++ ?></th>
                                                        <th><?php echo $row["city_name"] ?></th>
                                                        <th><?php echo $row["name"] ?></th>

                                                        <th><?php echo $row["contact"] ?></th>
                                                        <th><?php echo $row["email"] ?></th>
                                                        <td><img height="100px" src="uploads/architect/<?php echo $row["profile_photo"] ?>" alt=""></td>

                                                        <th><?php echo $row["firm_name"] ?></th>
                                                        <th><?php echo $row["firm_contact"] ?></th>
                                                        <th><?php echo $row["firm_mail"] ?></th>
                                                        <th><?php echo $row["website"] ?></th>

                                                        <th><?php echo $row["isverify"] ?></th>
                                                        <td><img height="100px" src="uploads/architect/<?php echo $row["addhar_card_photo"] ?>" alt=""></td>
                                                        <th><?php echo $row["addhar_card_number"] ?></th>
                                                        <th><?php echo $row["qualification"] ?></th>
                                                        <th><?php echo $row["experience"] ?></th>
                                                        <th><?php echo $row["specialization"] ?></th>
                                                        <td><img height="100px" src="uploads/architect/<?php echo $row["certificate_photo"] ?>" alt=""></td>
                                                        <th><?php echo $row["certificate_name"] ?></th>
                                                        <th><?php echo $row["regi_date_time"] ?></th>
                                                        <th><?php echo $row["isblocked"] ?></th>

                                                        <td><img height="100px" src="uploads/architect/<?php echo $row["cover_photo"] ?>" alt=""></td>
                                                        <th><?php echo $row["address"] ?></th>
                                                        <th><?php echo $row["landmark"] ?></th>
                                                        <th><?php echo $row["pincode"] ?></th>
                                                        <th><?php echo $row["lattitude"] ?></th>
                                                        <th><?php echo $row["longtitude"] ?></th>
                                                        <th><?php echo $row["isapproved"] ?></th>
                                                        <th><?php echo $row["about_us"] ?></th>

                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                        <!-- seller table view -->


                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">sellers</h4>
                                    <div class="table-responsive">

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
                                                    <th>contact number</th>
                                                    <th>e-mail</th>
                                                    <th>password</th>
                                                    <th>isverify</th>
                                                    <th>otp</th>
                                                    <th>isblock</th>
                                                    <th>isapprove</th>
                                                    <th>cover photo</th>
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
                                                    <th>longtitude</th>

                                                </tr>
                                            </thead>


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
                                                        <td><?php echo $row["contact"] ?></td>
                                                        <td><?php echo $row["email"] ?></td>
                                                        <td><?php echo $row["password"] ?></td>
                                                        <td><?php echo $row["isverify"] ?></td>
                                                        <td><?php echo $row["otp"] ?></td>
                                                        <td><?php echo $row["isblock"] ?></td>
                                                        <td><?php echo $row["isapprove"] ?></td>
                                                        <td><img height="100px" src="uploads/seller/cover photo/<?php echo $row["cover_photo"] ?>" alt=""></td>
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
                                                        <td><?php echo $row["longtitude"] ?></td>



                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                        <!-- seller table view -->


                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Transaction Modal -->
            <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                            <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                    <p class="text-muted mb-0">$ 225 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 255</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                    <p class="text-muted mb-0">$ 145 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 145</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                                Free
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <!-- subscribeModal -->
            <!-- <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <div class="avatar-md mx-auto mb-4">
                                        <div class="avatar-title bg-light rounded-circle text-primary h1">
                                            <i class="mdi mdi-email-open"></i>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h4 class="text-primary">Subscribe !</h4>
                                            <p class="text-muted font-size-14 mb-4">Subscribe our newletter and get notification to stay update.</p>

                                            <div class="input-group bg-light rounded">
                                                <input type="email" class="form-control bg-transparent border-0" placeholder="Enter Email address" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                
                                                <button class="btn btn-primary" type="button" id="button-addon2">
                                                    <i class="bx bxs-paper-plane"></i>
                                                </button>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- end modal -->

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

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
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


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:31:35 GMT -->

</html>