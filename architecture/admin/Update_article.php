<?php include 'session.php' ?>


<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update articles</title>
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
                                <h4 class="mb-sm-0 font-size-18">Update articles</h4>

                                <div class="page-title-right">
                                    <a type="submit" href="View_articles.php" class="btn btn-primary waves-effect waves-light">Back</a>
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
                                    
                                    if (isset($_POST["btnsubmit"])) {

                                        $cid = $_POST["cid"];
                                        $url = $_POST["url"];
                                      
                                        $title = $_POST["title"];
                                        $des = $_POST["des"];
                                        $ref = $_POST["ref"];
                                        $added = $_POST["added"];
                                        $active = $_POST["active"];
                                        $id = $_GET["updateid"];
                                        $oldimage = $_POST["oldtextimage"];

                                        $newimage = "";


                                        // echo $state;

                                        $sql = mysqli_query($conn, "select * from tbl_articles where title='$title' ");

                                        if (mysqli_num_rows($sql) <= 0) {

                                            if(empty($_FILES["url"]["name"]))
                                            {
                                                $newimage=$oldimage;
                                            }
                                            else
                                            {
                                                unlink("uploads/articles/" . $oldimage);
                                                
                                            // echo $name;
    
                                            $ext = pathinfo($_FILES["url"]["name"], PATHINFO_EXTENSION);
                                            $filename3 = time() . rand(1111, 9999) . "." . $ext; //7y4489u394.png
                                            move_uploaded_file($_FILES["url"]["tmp_name"], "uploads/brands/" . $filename3);
                                                $newimage=$filename3;
                                            }

                                        if (mysqli_num_rows($sql) <= 0) {

                                        $result = mysqli_query($conn , "update tbl_articles set architect_id='$cid', img_url='$filename3',title='$title', description='$des', ref_wed_url='$ref', isactive='$active', article_datetime='$added' where article_id='$id' ") or die(mysqli_errno($conn));

                                        if ($result == true) {

                                            echo "<script>window.location='View_articles.php'</script>";
                                        } else {
                                            echo "error";
                                        }
                                    }
                                    } else {
                                        ?>
                                        <div class="alert alert-warning mb-0" role="alert">
                                            Article Already Exits!
                                        </div>
                                <?php
                                    }
                                    }

                                    ?>

                                    <?php
                                    
                                    if(isset($_GET["updateid"]))
                                    {
                                        $id = $_GET["updateid"];
                                        // echo $id;

                                        $result = mysqli_query($conn,"select * from tbl_articles where article_id='$id'");
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    
                                ?>


                                    <form id="frm" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">architect name</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="cid" id="cid">

                                                    <option value="">Select architect Name</option>
                                                    <?php
                                                    $count = "1";
                                                    $result = mysqli_query($conn, "select * from tbl_architect") or die(mysqli_error($conn));

                                                    while ($row1 = mysqli_fetch_assoc($result)) {



                                                    ?>
                                                       <option  <?php if($row1["architect_id"]==$row["architect_id"]) { ?> selected <?php } ?> value=" <?php echo $row1["architect_id"] ?>"><?php echo $row1["name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["img_url"] ?>" type="hidden" name="oldtextimage" id="catname">  
                                            </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">image url</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["img_url"] ?>"  type="text" name="url" id="url">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["title"] ?>" type="text" name="title" id="title">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">description</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["description"] ?>" type="text" name="des" id="des">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">reference website url</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="<?php echo $row["ref_wed_url"] ?>" type="text" name="ref" id="ref">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Added date & time</label>
                                            <div class="col-md-10">
                                                <input class="form-control"   type="datetime-local" name="added" id="added">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mt-4">
                                                <h5 class="font-size-14 mb-4">isactive</h5>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" value="yes" <?php if ($row["isactive"] == "yes") { ?> checked <?php } ?>  type="radio" name="active" id="active">
                                                    <label class="form-check-label" for="formRadios1">
                                                        yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="no" <?php if ($row["isactive"] == "no") { ?> checked <?php } ?> type="radio" name="active" id="active">
                                                    <label class="form-check-label" for="formRadios2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Update article</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
                                        </div>

                                        <?php
                                     }
                                    }
                                    ?>
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

    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script> -->


    <script>
        $(document).ready(function() {

            $("#frm").validate({

                rules: {
                    aid: {
                        required: true
                    },
                    url: {
                        required: true
                    },
                    video: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    des: {
                        required: true
                    },
                    ref: {
                        required: true
                    },
                    added: {
                        required: true
                    },



                },

                messages: {

                    aid: {
                        required: "please enter architect id"
                    },
                    url: {
                        required: "please enter image url"
                    },
                    video: {
                        required: "please enter video url"
                    },
                    title: {
                        required: "please enter the title"
                    },
                    des: {
                        required: "please enter the description"
                    },
                    ref: {
                        required: "please enter the reference website url"
                    },
                    added: {
                        required: "please select date & time"
                    },

                }

            });


        });
    </script>



</body>


<!-- Mirrored from themesbrand.com/skote/layouts/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Jul 2022 08:34:15 GMT -->

</html>